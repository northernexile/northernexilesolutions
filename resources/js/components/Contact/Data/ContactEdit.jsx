import React, {useEffect} from "react"
import {useParams} from "react-router-dom";
import {useAppDispatch, useAppSelector} from "../../../redux/hooks/hooks";
import {viewContact} from "../../../redux/actions/contactActions";
import {CircularProgress, TextField} from "@mui/material";
import {useForm} from "react-hook-form";
import {updateContact} from "../../../redux/actions/contactActions";
import {useFormHooks} from "../../../hooks/useFormHooks";

const ContactEdit = () => {
    const {
        buttons,
        isReadOnly
    } = useFormHooks()
    const dispatch = useAppDispatch();
    const {register,handleSubmit} = useForm()
    const contact = useAppSelector(state => state.contact.contact)
    let {id} = useParams()

    useEffect(() => {
        dispatch(viewContact(id))
    }, [])

    const submitForm = (data) => {
        dispatch(updateContact(data))
    }

    const showForm = () => {
        return !(contact.id === '')
    }

    const formRow = (name, label, property, multiline) => {
        return (
            <div className={`form-row`}>
                <TextField
                    name={`text`}
                    className={ isReadOnly() ? `form-input form-input-text locked` : `form-input form-input-text unlocked`}
                    fullWidth
                    label={label}
                    {...register(name)}
                    defaultValue={property}
                    inputProps={
                        {readOnly: isReadOnly()}
                    }
                    rows={(multiline) ? 6 : 1}
                    multiline={!!multiline}
                />
            </div>
        )
    }

    const hiddenIdInput = (id) => {
        return <input type={`hidden`} name={`id`} value={id} {...register('id')}/>
    }

    const form = () => {
        return <form onSubmit={handleSubmit(submitForm)}>
            {hiddenIdInput(contact.id)}
            {formRow('name', 'Name', contact.name, false)}
            {formRow('email', 'Email', contact.email, false)}
            {formRow('text', 'Message', contact.text, true)}
            <div className={`form-row`}>
                {buttons()}
            </div>
        </form>
    }

    return (
        <>
            {showForm() ? form() : <CircularProgress/>}
        </>
    )
}

export default ContactEdit
