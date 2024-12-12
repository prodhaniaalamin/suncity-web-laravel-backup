

var appModeIsDev, tableData = [], tableReload, editData = { class_id: false }, addClicked, modalTitle,
    dataTableOptions = { "info": false }, currentData, runFnFromEdit, d_sh = ['none', 'block'], runFnAddButtonIsClicked,
    areas = [], firstOption = '', formDataContainer, dateFormat = 'dd/mm/yyyy';

var _token, base_url, asset, prefix, asset;

document.addEventListener("DOMContentLoaded", function () {
    _token = $('meta[name="csrf-token"]').attr('content'); // csrf token
    base_url = $('meta[name="base_url"]').attr('content');
    asset = $('meta[name="asset"]').attr('content');
    prefix = $('meta[name="prefix"]').attr('content');
    appModeIsDev = $('meta[name="appModeIsDev"]').attr('content');
    asset = asset.slice(asset.length - 1) === '/' ? asset : asset + '/';
    $(document).on('click', '.delete-row', deleteRecord);
    $(document).on('click', 'span.switch-button', switchButtonClicked);
    appModeIsDev = appModeIsDev === '1' ? true : false;
});


function deleteRecord(e) {
    e.preventDefault();
    if (confirm('Are you sure to delete?')) {
        axios.delete(e.target.dataset.deleteUrl).then(response => {
            if (response.data !== 0) {
                location.reload();
            }
        });
    }
}

function switchButtonClicked() {
    let text = this.dataset.statusText, url = this.dataset.switchAi;
    let actionId = url.split('/');
    action_id = url.includes('edit') ? actionId.pop() : actionId[actionId.length - 1];
    actionId = parseInt(action_id === 'edit' ? actionId.pop() : action_id);

    Swal.fire({
        text: `Are you sure you would like to ${text}?`,
        icon: "warning",
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonText: `Yes, ${text} it!`,
        cancelButtonText: "No, return",
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: "btn btn-active-light"
        }
    }).then(function (result) {
        if (result.dismiss === 'cancel') {
            Swal.fire({
                text: "Your switch is successfully completed!.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary",
                }
            });
        } else {
            axios.get(url).then(response => {
                if (response.data !== 0) {
                    tableReload && typeof tableReload === 'function' ? tableReload(actionId, 'delete') : location.reload();
                }
            });
        }
    });
}

function dynamicallySetValueOfElements(formFieldSelector, filedData) {
    let formElement = document.querySelector(formFieldSelector).form;
    if (formElement && filedData && filedData.constructor === Object && Object.keys(filedData).length) {
        for (let [key, value] of Object.entries(filedData)) {
            let element = formElement.elements[key];
            element = element ? element : value && value.constructor.name === "Array" ? formElement.elements[`${key}[]`] : element
            if ((value || value === 0) && element && value.constructor !== Object) {
                value = value.toString();
                if (element.nodeName !== 'TEXTAREA') {
                    if (element.nodeName === 'INPUT' && ['file', 'checkbox', 'radio'].includes(element.type)) {
                        if (element.type === 'file') {
                            let img = element.parentElement.querySelector('img');
                            if (img) {
                                img.src = `${asset}${value}`;
                                img.style.display = 'block';
                                let next = img.nextElementSibling
                                if (next && next.nodeName === 'SPAN') {
                                    next.style.display = 'none';
                                }
                            } else {
                                element = element.parentElement.previousElementSibling;
                                if (element && element.classList.contains('image-input-wrapper')) {
                                    element.style.backgroundImage = `url(${asset}${value})`;
                                }
                            }
                        } else if (element.type === 'checkbox' || element.type === 'radio') {
                            element.value == value ? element.setAttribute('checked', 'checked') : element.removeAttribute('checked');
                            $(element).change();
                        }
                    } else if (element.nodeName === 'SELECT') {
                        removeSelected(element);
                        element = $(element);
                        value = element.attr('multiple') || isNaN(value) ? value : parseInt(value);

                        if (element.attr('multiple')) {
                            element.children().each((i, option) => {
                                if (option.value.length && value.includes(option.value)) {
                                    option.setAttribute('selected', 'selected');
                                }
                            });
                        } else {
                            element.children().each((i, option) => {
                                let val = isNaN(option.value) ? option.value : parseInt(option.value);
                                if (val === value) {
                                    option.setAttribute('selected', 'selected');
                                }
                            });
                        }
                        if (element.attr('data-control') === 'select2') {
                            select2Recheck(element);
                        }
                    } else {
                        element.value = value.includes('[') || value.includes('}') ? element.value : value;
                        if (element.name === 'password') {
                            $(`${selectorId} input[name="retype"]`).val(value);
                        }
                    }
                } else {
                    element.textContent = value;
                }
            }
        }
    }
}

function removeSelected(select) {
    let index = 0;
    for (let option of select) {
        if (index) {
            option.removeAttribute('selected');
            for (let dataAttr in option.dataset) {
                option.removeAttribute(dataAttr);
            }
        }
        index++;
    }
    select2Recheck($(select));
}

function getOptions(data, selectedId = [''], output = '', key = 'name', vk = 'id') { // vk = option value object[property] name
    output += firstOption;
    if (!data) return output;
    data.map(option => {
        let selected = option[vk] === selectedId || (selectedId.constructor.name == "Array" && selectedId.includes(option[vk])) ? `selected ` : '';
        if (option && !isNaN(option[vk])) {
            output += `<option ${selected}value="${option[vk]}">${option[key]}</option>`;
        }
    });
    firstOption = '';
    return output;
}

function optionSelectHand(selector, selectedVal) {
    let select = $(selector);
    selectedVal = isNaN(selectedVal) ? selectedVal : selectedVal.toString();
    if (select.attr('multiple')) {
        select.each(function () {
            if (selectedVal === this.value || selectedVal === this.innerHTML) {
                this.setAttribute('selected', true);
            } else {
                this.removeAttribute('selected');
            }
        })
    } else {
        select.val(selectedVal);
        select.attr('selected', true);
    }
    select2Recheck(select);
}

function select2Recheck(element) {
    let options = {
        dir: document.body.getAttribute('direction')
    };

    if (element.attr('data-hide-search') == 'true') {
        options.minimumResultsForSearch = Infinity;
    }
    return element.select2(options);
}

document.addEventListener("DOMContentLoaded", function () {

    $(document).on('click', 'li.paginate_button', function (e) {
        KTMenu.createInstances();
    })


    const linkContainer = document.getElementById('#kt_aside_menu')
    for (let link of linkContainer.querySelectorAll('a.menu-link')) {
        if (location.href === link.href) {
            let itemParent = link.parentElement.parentElement;
            Array(5).find(() => {
                if (itemParent.className.includes('accordion')) {
                    itemParent = itemParent.parentElement;
                    itemParent.firstElementChild.click();
                }
            });
            link.classList.add('active');
        }
    }

    $('[data-toggle="datepicker"]').datepicker({
        format: dateFormat,
    }).on('change', function (e) {
        $(this).datepicker('hide');
    });

});

function addButtonIsClicked(e, modal) {
    modal.find('.modal-title').text(modalTitle);
    modal.find('input[name="_method"]').val('POST');
    modal.find('.image-input-wrapper').removeAttr('style');

    modal.find('.hide').hide();
    modal.find('form').attr('action', actionurl)[0].reset();
    modal.find('button[type="submit"]').text("Submit");
    modal.find('select').each((i, select) => removeSelected(select));
    runFnAddButtonIsClicked && typeof runFnAddButtonIsClicked === 'function' && runFnAddButtonIsClicked()
}

function editButtonIsClicked(e, modal) {
    let id = isNaN(e.target.id) ? parseInt(e.target.id.slice(5, 15)) : parseInt(e.target.id);
    let title = modal.find('.modal-title');
    let titleText = title.text().length > 0 ? title.text() : modalTitle;
    titleText = titleText.replace('add', 'edit');
    titleText = titleText.replace('Add new', 'Edit');
    titleText = titleText.replace('Add', 'Edit');
    title.text(titleText);
    modal.find('input[name="_method"]').val('PUT');
    modal.find('.hide').hide();

    modal.find('form').attr('action', `${actionurl}/${id}`);
    editData = tableData.find(item => item.id === id);

    dynamicallySetValueOfElements('input[name="_method"]', editData);
    modal.find('button[type="submit"]').text("Update");
    if (runFnFromEdit && typeof runFnFromEdit === 'function') return runFnFromEdit(editData)
}

function upFirst(str) {
    return str ? str.toLowerCase().replace(/\b[a-z]/g, function (letter) {
        return letter.toUpperCase();
    }) : str;
}

let shortMonths = {
    '1': 'Jan',
    '2': 'Feb',
    '3': 'Mar',
    '4': 'Apr',
    '5': 'May',
    '6': 'Jun',
    '7': 'Jul',
    '8': 'Aug',
    '9': 'Sep',
    '10': 'Oct',
    '11': 'Nov',
    '12': 'Dec'
};

let fullMonths = {
    '1': 'January',
    '2': 'February',
    '3': 'March',
    '4': 'April',
    '5': 'May',
    '6': 'June',
    '7': 'July',
    '8': 'August',
    '9': 'September',
    '10': 'October',
    '11': 'November',
    '12': 'December'
};

function getMonth(get, short) {
    months = short ? shortMonths : fullMonths;
    if (get) {
        get = get.toString();
        return isNaN(get) ? getKeyByValue(months, get) : months[get < 10 && get.includes('0') ? get.replace('0', '') : get];
    }
    return months;
}

function getKeyByValue(object, value) {
    return value ? Object.keys(object).find(key => object[key] === value) : Object.keys(object)[0];
}

function getDaysOfMonth(month, year) {
    return new Date(year, month, 0).getDate();
}

// to get academic condition parents by child id
function nestedParentByChildId(id, data, parentKey = 'parent_id') {
    let parent = {};
    let container = [];
    id = parseInt(id);
    while (parent) {
        parent = data.find(item => item.id === id);
        if (parent) {
            container.push(parent);
            id = parent[parentKey];
        }
    }
    return container.sort((a, b) => a.id - b.id);
}
function editRelationFillUp(edit, childId, parentKey, notNeedArea) {
    nestedParentByChildId(childId, areas, parentKey).map(item => {
        if (notNeedArea && (item.type === 'area' || item.id === edit.id)) return 1;
        let data = areas.filter(row => row.parent_id === item.parent_id);
        if (data.length) {
            $(`select[name="${item.type}"]`).html(`<option value="">Select ${upFirst(item.type)}</option>${getOptions(data, item.id)}`);
            select2Recheck($(`select[name="${item.type}"]`))
            $(`.${item.type}.hide`).show();
        }
    });
}

function formatDate(date, shortM) {
    let d = new Date(date),
        day = d.getDate(),
        month = d.getMonth() + 1,
        year = d.getFullYear();
    return `${day} ${shortM ? shortMonths[month] : fullMonths[month]}, ${year}`;
}

function getStatus(status = 0, switchRoute = '', statusData = ['Inactive', 'Active']) {
    let statusClass = ['danger', 'success'];
    let statusString = statusData[status];
    let statusReversText = statusData[status > 0 ? 0 : 1];
    return `<span data-status-text="${statusReversText}" data-switch-ai="${switchRoute}" style="cursor: pointer" class="switch-button badge badge-light-${statusClass[status]}">${statusString}</span>`;
}



// for preview image
const fileContainer = document.querySelectorAll('.file-select');
if (fileContainer) {
    for (let el of fileContainer) {
        let element = el.querySelector('input[type="file"]')
        const targetElement = el.querySelector('.select-target');
        const image = el.querySelector('img');
        element.addEventListener('change', (e) => {
            targetElement ? targetElement.style.display = 'none' : false;
            let reader = new FileReader();
            reader.onload = () => {
                image.src = reader.result
                image.style.display = 'block';
                image.classList.remove("hide");
                if (image.parentElement && image.parentElement.classList.contains('hide')) {
                    image.parentElement.classList.remove('hide');
                }
            }
            reader.readAsDataURL(e.target.files[0]);
        })
    }
} // end
function fileSelectReset() {
    Array.from(fileContainer).map(dom => {
        dom = $(dom);
        if (dom.hasClass('edit')) return false;
        dom.find('.select-target').removeAttr('style');
        dom.find('img').css('display', 'none');
    })
}
fileSelectReset();

// error message popup handler
function errorMessage(error) {
    Swal.fire({
        text: error.message,
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: error.bt ? error.bt : 'Ok',
        customClass: {
            confirmButton: "btn btn-primary",
        }
    });
}

/// check string is json, if this data is json and param=true then return js object ///
var jsonToObj; /// json to js object converted data container ///
function is_json(data) {
    try {
        jsonToObj = JSON.parse(data);
        setTimeout(function () {
            jsonToObj = undefined;
        }, 1000);
        return jsonToObj;
    } catch (e) {
        return false;
    }
}

function randomNumber(limit = 5) {
    return Math.random().toFixed(limit).toString().split('.')[1];
}

function parseTime(s, returnBack, zeroHourCheck) {
    if (!s) return {
        hm: 0,
        hh: 0,
        mm: 0
    }
    var part = s.match(/(\d+):(\d+)(?: )?(AM|PM)?/i);
    var hh = parseInt(part[1], 10);
    var mm = parseInt(part[2], 10);
    var ap = part[3] ? part[3].toUpperCase() : null;

    if (ap === "AM") {
        if (hh == 12) {
            hh = 0;
        }
    }
    if (ap === "PM") {
        if (hh != 12) {
            hh += 12;
        }
    }

    //hour to minuit and plus minuit
    var hm = (hh * 60) + mm;

    if (hm < 1 && zeroHourCheck) {
        hm = 720;
    }

    if (returnBack === 'h') {
        return hh;
    } else if (returnBack === 'm') {
        return (hh * 60) + mm
    } else if (returnBack === 's') {
        return (((hh * 60) + mm) * 60) + ss
    } else if (returnBack === 'hm') {
        return {
            hh: hh,
            mm: mm
        }
    }
    return {
        hm,
        hh: hh,
        mm: mm
    };
}

function to_hms(miliSecond) {
    var hh = Math.floor(miliSecond / 1000 / 60 / 60);
    miliSecond -= hh * 1000 * 60 * 60;
    var mm = Math.floor(miliSecond / 1000 / 60);
    miliSecond -= mm * 1000 * 60;
    var ss = Math.floor(miliSecond / 1000);
    return {
        hh,
        mm,
        ss
    };
}

function diff_dtms(date, startTime, finishTime) {
    var days = Math.floor(milisec_diff / 1000 / 60 / (60 * 24));

    var date_diff = new Date(milisec_diff);
    return {
        days,
        hh: date_diff.getHours(),
        mm: date_diff.getMinutes(),
        ss: date_diff.getSeconds()
    };
}

function startFinishTime(fromDate, startTime, finishTime, sequentCheck) {
    fromDate = fromDate.split('-').map(v => parseInt(v));
    let dateData = [...fromDate], d = dateData.shift(), m = dateData.shift(), y = dateData.shift(); //date = d, month = m, year = y
    let s_processed = parseTime(startTime);
    let f_processed = parseTime(finishTime);

    //  new Date(year, month, day, hh, mm, ss, ms);  js month start index from 0
    let start_ = new Date(y, m - 1, d, s_processed.hh, s_processed.mm, 0, 0);
    let finish_ = new Date(y, m - 1, d, f_processed.hh, f_processed.mm, 0, 0);

    let finish = finish_.getTime();
    let start = start_.getTime();

    s_processed.hm = s_processed.hm ? s_processed.hm : s_processed.hm + 720;
    f_processed.hm = f_processed.hm ? f_processed.hm : f_processed.hm + 720;

    if (sequentCheck && s_processed.hm > f_processed.hm) {
        return {
            error: true,
            mess: `Sorry! Starting time and finish time invalid. because ${startTime} > ${finishTime}`
        };
    }
    return {
        start,
        finish,
        difference: finish - start
    };
}

function get_time_diff(fromDate, startTime, finishTime, returnBack = 'h') {
    let startFinish = startFinishTime(fromDate, startTime, finishTime);
    let diff_hms = to_hms(startFinish.difference);
    if (returnBack === 'h') {
        return diff_hms.hh;
    } else if (returnBack === 'm') {
        return diff_hms.hh * 60 + diff_hms.mm
    } else if (returnBack === 's') {
        return (diff_hms.hh * 60 + diff_hms.mm) * diff_hms.ss
    } else if (returnBack === 'hm') {
        return {
            hh: diff_hms.hh,
            mm: diff_hms.mm
        }
    }
    return diff_hms;
}

function getFormData(selector) {
    formDataContainer = formDataContainer ? formDataContainer : new FormData();

    $(selector).serializeArray().map(el => {
        let key = el.name.trim(), keyLength = key.length;
        let value = isNaN(el.value) ? el.value.trim() : parseFloat(el.value.trim());
        if (key.slice(keyLength - 3, keyLength) === '_id') {
            let selectDom = $(`${selector} select[name="${key}"]`);
            selectDom.length > 0 ? formDataContainer.append(key.split('_')[0] + 'Text', selectDom.find('option:selected').text()) : false;
        }
        formDataContainer.append(key, value);
    })
    formDataContainer.append('_token', document.querySelector('[name="csrf-token"]').content);
    return formDataContainer;
}

function getPercentage(amount, percentage, reverse) {
    amount = parseFloat(amount);
    percentage = parseFloat(percentage);
    amount = isNaN(amount) ? 0 : amount
    percentage = isNaN(percentage) ? 0 : percentage;

    percentage = reverse ? ((reverse * 100) / amount).toFixed(2) : ((percentage / 100) * amount).toFixed(2);
    return isNaN(percentage) ? 0.00 : parseFloat(percentage);
}

function getHundredPercent(totalNumber, percentageFor) {
    if (totalNumber < 1 || percentageFor < 1 || isNaN(totalNumber) || isNaN(percentageFor)) return 0;
    totalNumber = parseFloat(totalNumber);
    percentageFor = parseFloat(percentageFor);
    return parseFloat(((percentageFor * 100) / totalNumber).toFixed(2));
}

function getSettings(schoolSettings, settingKey) {
    if (!schoolSettings) return null;

    if (!schoolSettings.hasOwnProperty(settingKey)) null;
    return schoolSettings[settingKey];
}

function getYoutubeLinkID (url) {
    if (!url) return url;
    let regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
    let match = url.match(regExp);
    return (match && match[7].length == 11) ? match[7] : false;
}
