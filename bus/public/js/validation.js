class FormsValidation {
    selectors = {
        form: '[data-js-form]',
        fieldErrors: '[data-js-field-errors]',
        password: '[data-js-password]',
    }

    errorMessages = {
        valueMissing: () => 'Пожалуйста, заполните это поле',
        patternMismatch: ({ title }) => title || 'Данные не соответствуют формату',
        tooShort: ({ minLength }) => `Слишком короткое значение, минимум символов — ${minLength}`,
        tooLong: ({ maxLength }) => `Слишком длинное значение, ограничение символов — ${maxLength}`,
    }

    constructor(){
        this.bindEvents()
    }

    manageErrors(fildControlElement, erroeMessages){
        let fieldErrorsElement
        if(fildControlElement.matches(this.selectors.password)){
            fieldErrorsElement = fildControlElement.parentElement.parentElement.querySelector(this.selectors.fieldErrors)

        }
        else{
            fieldErrorsElement = fildControlElement.parentElement.querySelector(this.selectors.fieldErrors)
        }

        fieldErrorsElement.innerHTML = erroeMessages
        .map((message) => `<span class="field__error">${message}</span>`)
        .join('<br>')
    }

    validateField(fieldControlElement){
        const errors = fieldControlElement.validity
        const errorMessages = []

        Object.entries(this.errorMessages).forEach(([errorType, errorMessage]) =>{
            if(errors[errorType]){
                errorMessages.push(errorMessage(fieldControlElement))
            }
        })

        this.manageErrors(fieldControlElement, errorMessages)

        const isValid = errorMessages.length === 0

        fieldControlElement.ariaInvalid = !isValid

        return isValid
    }

    onBlur(event){
        const { target } = event
        const isFormField = target.closest(this.selectors.form)
        const isRequired = target.required

        if(isFormField && isRequired) {
            this.validateField(target)
        }
    }

    onSubmit(event) {
        const isFormElement = event.target.matches(this.selectors.form)
        if (!isFormElement) {
            return
        }
    
        const requiredControlElements = [...event.target.elements].filter(({ required }) => required)
        console.log('re', requiredControlElements);
        let isFormValid = true
        let firstInvalidFieldControl = null
    
        requiredControlElements.forEach((element) => {

            const isFieldValid = this.validateField(element)
            
            if (!isFieldValid) {
                isFormValid = false
    
                if (!firstInvalidFieldControl) {
                    firstInvalidFieldControl = element
                }
            }
        })
    
        if (!isFormValid) {
            event.preventDefault()
            firstInvalidFieldControl.focus()
        }
    }

    bindEvents(){
        document.addEventListener('blur', e =>{
            this.onBlur(e)
        }, true)
        document.addEventListener('submit', e =>{
            this.onSubmit(e)
        })
    }
}

export {FormsValidation}