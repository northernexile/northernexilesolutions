import React, {useEffect} from "react"
import {useAppDispatch, useAppSelector} from "../../../redux/hooks/hooks";
import {CircularProgress} from "@mui/material";
import {FormProvider, useForm} from "react-hook-form";
import {addExperience} from "../../../redux/actions/resumeActions";
import {useFormHooks} from "../../../hooks/useFormHooks"
import FormRowInput from "../../../controls/rows/FormRowInput";
import FormRowInputDate from "../../../controls/rows/FormRowInputDate";
import FormRowMultilineInput from "../../../controls/rows/FormRowMultilineInput";
import {useSelector} from "react-redux";
import {selectExperience} from "../../../redux/slices/experienceSlice";


const ResumeAdd = () => {

    const {
        createButton
    } = useFormHooks()
    const dispatch = useAppDispatch();
    const methods = useForm()
    const experience = useSelector(selectExperience);

    useEffect(()=>{
       console.log(experience);
    },[])

    const submitForm = (data) => {
        dispatch(addExperience(data)).then((response)=>{
            console.log(experience)
        })
    }

    const showForm = () => {
        return true
    }

    const form = () => {
        return <FormProvider {...methods}>
            <form onSubmit={methods.handleSubmit(submitForm)}>
                <FormRowInput name={`company`} label={`Company`} control={methods.control} />
                <FormRowInput name={`title`} label={`Title`} control={methods.control} />
                <FormRowMultilineInput name={`description`} label={`Description`} control={methods.control} />
                <FormRowInputDate name={`start`} label={`Start`} control={methods.control} />
                <FormRowInputDate name={`stop`} label={`Stop`} control={methods.control} />
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
