import React, {useEffect} from "react"
import {useAppDispatch, useAppSelector} from "../../../redux/hooks/hooks";
import {CircularProgress} from "@mui/material";
import {FormProvider, useForm} from "react-hook-form";
import {addExperience} from "../../../redux/actions/resumeActions";
import {useFormHooks} from "../../../hooks/useFormHooks"
import InputDate from "../../../controls/InputDate";
import Input from "../../../controls/Input";
import MultilineInput from "../../../controls/MultilineInput";

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
        console.log(data)
        dispatch(addExperience(data))
    }

    const showForm = () => {
        return true
    }

    const form = () => {
        return <FormProvider {...methods}>
            <form onSubmit={methods.handleSubmit(submitForm)}>
                <div className={`form-row`}>
                    <Input name={`company`} label={`Company`} />
                </div>
                <div className={`form-row`}>
                    <Input name={`title`} label={`Title`} />
                </div>
                <div className={`form-row`}>
                    <MultilineInput name={`description`} label={`Description`} />
                </div>
                <div className={`form-row`}>
                    <InputDate name={`start`} label={`Start`} />
                </div>
                <div className={`form-row`}>
                    <InputDate name={`stop`} label={`Stop`} />
                </div>
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
