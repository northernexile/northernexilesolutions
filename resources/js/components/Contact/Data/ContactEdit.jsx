import React, {useEffect, useState} from "react"
import {useParams} from "react-router-dom";
import {useAppDispatch, useAppSelector} from "../../../redux/hooks/hooks";
import {viewContact} from "../../../redux/actions/contactActions";
import {CircularProgress, TextField} from "@mui/material";
import Button from "@mui/material/Button";
import {useForm} from "react-hook-form";
import {Cancel, Edit, Save} from "@mui/icons-material";
import Box from "@mui/material/Box";
import {updateContact} from "../../../redux/actions/contactActions";

const ContactEdit = () => {
    const dispatch = useAppDispatch();
    const {register, handleSubmit} = useForm()
    const contact = useAppSelector(state => state.contact.contact)
    let [editing, setEditing] = useState(false)
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

    const isReadOnly = () => {
        return editing === false
    }

    const buttons = () => {
        return isReadOnly() ? editButtons() : submitButtons()
    }

    const toggleEditable = () => {
        setEditing(!editing)
    }

    const editButtons = () => {
        return <>
            <Button endIcon={<Edit/>} onClick={() => toggleEditable()} variant={`contained`}
                    type={`button`}>Edit</Button>
        </>
    }

    const submitButtons = () => {
        return <Box display={`stack`} justifyContent={`space-between`}>
            <Button style={{marginRight: 2}} endIcon={<Save/>} variant={`contained`} type={`submit`}>Submit</Button>
            <Button endIcon={<Cancel/>} onClick={() => toggleEditable()} variant={`contained`}
                    type={`button`}>Cancel</Button>
        </Box>
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
