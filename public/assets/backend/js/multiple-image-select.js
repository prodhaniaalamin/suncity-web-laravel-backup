
let htlImage = (baseName) => {
    return `<div class="image"><input type="file" accept=".png, .jpg, .jpeg" data-base-name="${baseName}" /><span class="indicator-label">Select Image</span><i class="fas fa-times-circle btn-remove"></i></div>`;
};
let imageTypes = ["jpg", "jpeg", "png", "svg", "webp", "gif"];
let isEditCase = false, thisImageIsSingle = false;
$(document).on('click', ".file-select-container .image", function (e) {
    if (e.target.classList.contains("btn-remove")) {
        e.target.parentElement.remove();
        resetMultipleFileIndex();
        return;
    }
    this.querySelector("input[type=file]").click();
})
$(document).on('change', ".file-select-container .image input[type=file]", function () {
    let currentInput = this, imageElement = currentInput.parentElement;
    thisImageIsSingle = currentInput.attributes.single?.value === "true";

    if (currentInput.files.length) {
        const extension = currentInput.files[0].name.split('.').pop();
        if (!imageTypes.includes(extension)) {
            alert("Please select valid image");
            return;
        }
        const reader = new FileReader();
        reader.readAsDataURL(currentInput.files[0]);
        reader.onload = function () {
            imageElement.style.backgroundImage = `url(${reader.result})`;
            imageElement.style.border = '1px solid silver';
            imageElement.style.cursor = 'pointer';
            imageElement.classList.add("selected-image");
        }

        if (thisImageIsSingle || currentInput.nextElementSibling.tagName !== "SPAN") {
            return thisImageIsSingle ? currentInput.nextElementSibling?.remove() : false;
        }

        currentInput.nextElementSibling.remove();
        let multipleFileContainer = currentInput.parentElement.parentElement, baseName = currentInput.dataset.baseName;
        multipleFileContainer.insertAdjacentHTML('beforeend', htlImage(baseName));

        if (!multipleFileContainer.querySelector(`input[type="hidden"]`)) {
            multipleFileContainer.insertAdjacentHTML('beforeend', `<input type="hidden" name="${baseName}"/>`);
        }
        return resetMultipleFileIndex(currentInput.name.split("_")[0]);
    }
});

$('.file-select-container').each(function () {
    let multipleFileContainer = this, fileSelectInputs = $(this).find('.edit-image input[type=file]'), totalInputs = fileSelectInputs.length;
    isEditCase = fileSelectInputs.length > 0;
    fileSelectInputs.each(function () {
        if (this.attributes.single?.value === "true") {
            thisImageIsSingle = true;
        }
        let baseName = this.dataset.baseName;
        if (!multipleFileContainer.querySelector(`input[type="hidden"]`)) {
            multipleFileContainer.insertAdjacentHTML('beforeend', `<input type="hidden" name="${baseName}" value="${totalInputs}"/>`);
        }
    });
});

function resetMultipleFileIndex() {
    $(".file-select-container").each(function () {
        let baseName = 'image', fileContainer = $(this), imagesLength = fileContainer.find(".image").length;
        fileContainer.find(".image input[type=file]").each(function (i) {
            if (this.attributes.single?.value === "true") return true;

            if (i === 0) {
                baseName = this.dataset.baseName;
                if (baseName === undefined) {
                    alertMessage({ title: 'File base name is missing', text: "data-base-name='yourBaseName' Please set it", icon: "error", cancelBtn: false, confirmText: "Ok" });
                    return false;
                }

                !isEditCase && this.setAttribute("required", "required");
            }
            i++;
            this.name = baseName + "_" + i;
        });
        fileContainer.find(`input[name="${baseName}"]`).val(imagesLength - 1);
    });
}
