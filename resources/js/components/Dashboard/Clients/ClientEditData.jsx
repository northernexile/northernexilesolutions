import React, {useEffect, useState} from "react"
import {useParams} from "react-router-dom";
import {useAppDispatch} from "../../../redux/hooks/hooks";
import {updateClient, viewClient} from "../../../redux/actions/clientActions";
import {CircularProgress} from "@mui/material";
import {FormProvider, useForm} from "react-hook-form";
import {useFormHooks} from "../../../hooks/useFormHooks"
import {useSelector} from "react-redux";
import {selectClient} from "../../../redux/slices/clientSlice";
import FormRowInput from "../../../controls/rows/FormRowInput";
import Identity from "../../../controls/Identity";


const ClientEditData = () => {
    const {
        createButton
    } = useFormHooks()
    const dispatch = useAppDispatch();
    let client = useSelector(selectClient)
    let {id} = useParams()
    const [state, setState] = useState({
        id: null,
        name: 'Foo',
        email:'',
        phone:''
    });
    const methods = useForm({defaultValues:client});
    const { handleSubmit,control, setValue} = methods;


    useEffect(() => {
        dispatch(viewClient(id)).then((data) => {
            setState({
                requested: true,
            })
        })
    }, [])


    const submitForm = (data) => {
        dispatch(updateClient(data))
    }

    const {requested} = state

    const showForm = () => {
        if(requested && client.id !==null){
            setValue('id',client.id)
            setValue('name',client.name);
            setValue('email',client.email);
            setValue('phone',client.phone);
            return true
        }

        return false
    }

    const form = () => {
        return <FormProvider {...form}>
            <form onSubmit={handleSubmit(submitForm)}>
                <Identity name={`id`} control={control} />
                <FormRowInput name={`name`} label={`Name`} control={control} />
                <FormRowInput name={`email`} label={`Email`} control={control} />
                <FormRowInput name={`phone`} label={`phone`} control={control} />
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

export default ClientEditData
