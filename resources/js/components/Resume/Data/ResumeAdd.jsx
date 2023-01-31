import React from "react"
import {useAppDispatch, useAppSelector} from "../../../redux/hooks/hooks";
import {CircularProgress, TextField} from "@mui/material";
import {useForm} from "react-hook-form";
import {addExperience} from "../../../redux/actions/resumeActions";
import {useFormHooks} from "../../../hooks/useFormHooks"

const ResumeAdd = () => {
    const { isReadOnly,
        buttons
    } = useFormHooks()
    const dispatch = useAppDispatch();
    const {register,handleSubmit} = useForm()
    const experience = useAppSelector(state => state.experience.experience)

    const submitForm = (data) => {
        dispatch(addExperience(data))
    }

    const showForm = () => {
        return true
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

    const form = () => {
        return <form onSubmit={handleSubmit(submitForm)}>
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

export default ResumeAdd
