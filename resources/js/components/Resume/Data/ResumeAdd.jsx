import React, {useEffect} from "react"
import {useAppDispatch, useAppSelector} from "../../../redux/hooks/hooks";
import {CircularProgress} from "@mui/material";
import {FormProvider, useForm} from "react-hook-form";
import {addExperience} from "../../../redux/actions/resumeActions";
import {useFormHooks} from "../../../hooks/useFormHooks"
import FormRowInput from "../../../controls/rows/FormRowInput";
import FormRowInputDate from "../../../controls/rows/FormRowInputDate";
import FormRowMultilineInput from "../../../controls/rows/FormRowMultilineInput";


const ResumeAdd = () => {
    const {
        createButton
    } = useFormHooks()
    const dispatch = useAppDispatch();
    const methods = useForm()
    const experience = useAppSelector(state => state.experience)

    useEffect(()=>{
       console.log(experience);
    },[])

    const submitForm = (data) => {
        dispatch(addExperience(data))
    }

    const showForm = () => {
        return true
    }

    const form = () => {
        return <FormProvider {...methods}>
            <form onSubmit={methods.handleSubmit(submitForm)}>
                <FormRowInput name={`company`} label={`Company`} defaultValue={experience.company} value={experience.company} />
                <FormRowInput name={`title`} label={`Title`} defaultValue={experience.title} value={experience.title} />
                <FormRowMultilineInput name={`description`} label={`Description`} defaultValue={experience.description} value={experience.description} />
                <FormRowInputDate name={`start`} label={`Start`} />
                <FormRowInputDate name={`stop`} label={`Stop`} />
                <div className={`form-row`}>
                    {createButton()}
                </div>
            </form>
        </FormProvider>
    }

    return (
        <>
            {showForm() ? form() : <CircularProgress/>}
        </>
    )
}

export default ResumeAdd
