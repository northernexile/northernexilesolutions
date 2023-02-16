import React, {useEffect} from "react"
import {useAppDispatch} from "../../../redux/hooks/hooks";
import {CircularProgress} from "@mui/material";
import {FormProvider, useForm} from "react-hook-form";
import {addClient} from "../../../redux/actions/clientActions";
import {useFormHooks} from "../../../hooks/useFormHooks"
import FormRowInput from "../../../controls/rows/FormRowInput";
import {useSelector} from "react-redux";
import {selectClient} from "../../../redux/slices/clientSlice";

const ClientAdd = () => {

    const {
        createButton
    } = useFormHooks()
    const dispatch = useAppDispatch();
    const methods = useForm()
    const client = useSelector(selectClient);

    useEffect(()=>{
        console.log(client);
    },[])

    const submitForm = (data) => {
        dispatch(addClient(data)).then((response)=>{
            console.log(client)
        })
    }

    const showForm = () => {
        return true
    }

    const form = () => {
        return <FormProvider {...methods}>
            <form onSubmit={methods.handleSubmit(submitForm)}>
                <FormRowInput name={`name`} label={`name`} control={methods.control} />
                <FormRowInput name={`email`} label={`email`} control={methods.control} />
                <FormRowInput name={`phone`} label={`phone`} control={methods.control} />
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

export default ClientAdd
