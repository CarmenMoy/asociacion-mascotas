import JustValidate from 'just-validate';

export let validator = (form) => {

    let validation = new JustValidate(form, {
        errorFieldCssClass: 'is-invalid',
        errorLabelStyle: {
            fontSize: '14px',
            color: '#dc3545',
        },
        focusInvalidField: true,
        lockForm: true,
        errosContainer: '#errors-container',
    });

    validation
    .addField('#name', [
        {
        rule: 'minLength',
        value: 3,
        },
        {
        rule: 'maxLength',
        value: 30,
        },
    ])
    .addField('#lastname', [
        {
        rule: 'minLength',
        value: 3,
        },
        {
        rule: 'maxLength',
        value: 30,
        },
    ])
    .addField('#email', [
        {
        rule: 'required',
        errorMessage: 'Email is required',
        },
        {
        rule: 'email',
        errorMessage: 'Email is invalid!',
        },
    ]);

    return validation;
};