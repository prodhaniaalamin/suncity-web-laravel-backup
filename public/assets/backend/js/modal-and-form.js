

var currentModal, method, form, actionurl = '';
// On document ready
KTUtil.onDOMContentLoaded(function () {

    // select all modals
    const modalElements = document.querySelectorAll('.modal');
    if(modalElements) {

            const indicatorResetOr = (button, reset) => {
                button.disabled = !reset;
                !reset && button.form.submit();
                button.children[0].style.display = reset ? 'block': 'none';
                button.children[1].style.display = reset ? 'none':'block';
            }

            function indicator(){
                let button = this;
                if(this.form) {
                    let elements = button.form.elements, submit = true;
                    for(let key in elements) {
                        let val = elements[key].value;
                        if(elements[key].name && elements[key].required && (!val || val.length < 1)) {
                            submit = false;
                        }
                    }
                    if(submit) {
                        indicatorResetOr(button)
                        setTimeout(() => {
                            indicatorResetOr(button, true)
                        }, 1000);
                    }
                }
            }

            // submit action indicator control
            const indicatorButtons = document.querySelectorAll('[data-form-action="indicator"]');
            indicatorButtons && indicatorButtons.forEach(button => button.addEventListener('click', indicator));


            const modalShowHide = (button, modelSelector, needReset) => {
                let modal = $(modelSelector ? modelSelector:'div.modal.show');
                currentModal = modal;

                // if you want to run a function when click button
                if(button.dataset.callFn) { // this attribute must be contain a global function name
                    let callAFunction = window[this.dataset.callFn];
                    typeof callAFunction === 'function' && callAFunction(e)
                }


                button = modal ? modal.find('[data-form-action="indicator"]')[0]:0;
                if(button && button.form && needReset) { // form reset and form submission indicator control
                    indicatorResetOr(button, true);
                    button.form.reset(); // to reset form data
                }

                return modal && modal.modal(modal.hasClass('show') ? 'hide':'show');
            }

            // when click this button then open your targeted modal
            const modalShowButtons = document.querySelectorAll('[data-modal-show]');
            modalShowButtons && modalShowButtons.forEach(showButton => {
                showButton.addEventListener('click', function (e) {
                    if(showButton.classList.contains('edit-show')) {
                        editButtonIsClicked(e, $(showButton.dataset.modalShow))
                    }
                    modalShowHide(showButton, showButton.dataset.modalShow, 1); // modal-show must should be contain modal target or selector
                });
            });

            // when click this button then open your targeted modal and run a function if you want
            const clickAddButtons = document.querySelectorAll('[data-add-click-modal-target]'); // click-add must should be contain modal target or selector
            clickAddButtons && clickAddButtons.forEach(modalShowButton => {
                modalShowButton.addEventListener('click', function (e) {
                    modalShowHide(modalShowButton, modalShowButton.dataset.addClickModalTarget, 1);
                    if(modalShowButton.classList.contains('add-new')) {
                        addButtonIsClicked(e, $(modalShowButton.dataset.addClickModalTarget))
                    }

                    if (typeof addClicked !== 'undefined' && typeof addClicked === 'function') {
                        return addClicked(e);
                    }
                });
            });

            // this fn manage any opened modal to hide with confirm or force to hide
            function modalCloseORConfirm(e) {
                e.preventDefault();
                let button = this;

                if (button.dataset.modalCoc === 'confirm') {
                    Swal.fire({
                        text: "Are you sure you would like to cancel?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, cancel it!",
                        cancelButtonText: "No, return",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light"
                        }
                    }).then(function (result) {
                        if (result.value) {
                            modalShowHide(button);
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: `Your ${button.textContent.toLowerCase()} has not been cancelled!.`,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                }
                            });
                        }
                    });
                } else {
                    return modalShowHide(button);
                }
            }

            // model close or close with confirm condition buttons
            const modelHideButtons = document.querySelectorAll('[data-modal-coc]');
            modelHideButtons && modelHideButtons.forEach(hideButton => {
                hideButton.addEventListener('click', modalCloseORConfirm);
            });
    }
});
