import React, {useEffect, useState} from "react"
import {useParams} from "react-router-dom";
import {useAppDispatch} from "../../../redux/hooks/hooks";
import {updateExperience, viewExperience} from "../../../redux/actions/resumeActions";
import {CircularProgress} from "@mui/material";
import {FormProvider, useForm} from "react-hook-form";
import {useFormHooks} from "../../../hooks/useFormHooks"
import {useSelector} from "react-redux";
import {selectExperience} from "../../../redux/slices/experienceSlice";
import FormRowInput from "../../../controls/rows/FormRowInput";
import FormRowMultilineInput from "../../../controls/rows/FormRowMultilineInput";
import FormRowInputDate from "../../../controls/rows/FormRowInputDate";
import Identity from "../../../controls/Identity";


const ResumeEdit = () => {
    const {
        createButton
    } = useFormHooks()
    const dispatch = useAppDispatch();
    let experience = useSelector(selectExperience)
    let {id} = useParams()
    const [state, setState] = useState({
        id: null,
        title: 'Foo',
        company:'',
        description:'',
        start:null,
        stop: null,
    });
    const methods = useForm({defaultValues:experience});
    const { handleSubmit, reset, control, setValue, watch,register } = methods;


    useEffect(() => {
        dispatch(viewExperience(id)).then((data) => {
            setState({
                requested: true,
            })
        })
    }, [])


    const submitForm = (data) => {
        dispatch(updateExperience(data))
    }

    const {requested} = state

    const showForm = () => {
        if(requested && experience.id !==null){
            setValue('id',experience.id)
            setValue('title',experience.title);
            setValue('company',experience.company);
            setValue('description',experience.description);
            setValue('start',experience.start);
            setValue('stop',experience.stop);
            return true
        }

        return false
    }

    const form = () => {
        return <FormProvider {...form}>
                <form onSubmit={handleSubmit(submitForm)}>
                    <Identity name={`id`} control={control} />
                    <FormRowInput name={`company`} label={`Company`} control={control} />
                    <FormRowInput name={`title`} label={`Title`} control={control} />
                    <FormRowMultilineInput name={`description`} label={`Description`} control={control} />
                    <FormRowInputDate name={`start`} label={`Start`} control={control} />
                    <FormRowInputDate name={`stop`} label={`Stop`} control={control} />
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

export default ResumeEdit
