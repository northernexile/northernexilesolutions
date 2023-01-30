import React, {useEffect, useState} from "react"
import {useParams} from "react-router-dom";
import {useAppDispatch, useAppSelector} from "../../../redux/hooks/hooks";
import {viewResumeItem} from "../../../redux/actions/resumeActions";
import {CircularProgress, TextField} from "@mui/material";
import Button from "@mui/material/Button";
import {useForm} from "react-hook-form";
import {Cancel, Edit, Save} from "@mui/icons-material";
import Box from "@mui/material/Box";
import {updateResumeItem} from "../../../redux/actions/resumeActions";

const ResumeEdit = () => {
    const dispatch = useAppDispatch();
    const {register, handleSubmit} = useForm()
    const experience = useAppSelector(state => state.experience.experience)
    const [editing, setEditing] = useState(false)
    let {id} = useParams()

    useEffect(() => {
        dispatch(viewResumeItem(id))
    }, [])

    const submitForm = (data) => {
        dispatch(updateResumeItem(data))
    }

    const showForm = () => {
        return !(experience.id === '')
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
            {hiddenIdInput(experience.id)}
            {formRow('company', 'Company', experience.company, false)}
            {formRow('name', 'Name', experience.name, false)}
            {formRow('description', 'Description', experience.description, true)}
            {formRow('start', 'Start date', experience.start, false)}
            {formRow('stop', 'End date', experience.stop, false)}
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

export default ResumeEdit
