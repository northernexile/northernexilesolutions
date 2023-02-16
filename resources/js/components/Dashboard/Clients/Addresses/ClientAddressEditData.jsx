
import React, {useEffect} from "react"
import {useParams} from "react-router-dom";
import {useAppDispatch, useAppSelector} from "../../../../redux/hooks/hooks";
import {viewClientAddress} from "../../../../redux/actions/clientAddressActions";
import {updateAddress} from "../../../../redux/actions/addressActions";
import {FormProvider, useForm} from "react-hook-form";
import FormRowInput from "../../../../controls/rows/FormRowInput";
import Button from "@mui/material/Button";
import {Save} from "@mui/icons-material";
import Identity from "../../../../controls/Identity";

const ClientAddressEditData = ({clientAddress}) => {
    const dispatch = useAppDispatch()
    const params = useParams();

    const methods = useForm();

    const initialiseForm = () => {
        let address = clientAddress.address
        methods.setValue('id',address.id)
        methods.setValue('thoroughfare',address.thoroughfare)
        methods.setValue('address_line_1',address.address_line_1)
        methods.setValue('address_line_2',address.address_line_2)
        methods.setValue('address_line_3',address.address_line_3)
        methods.setValue('town',address.town)
        methods.setValue('county',address.county)
        methods.setValue('postcode',address.postcode)
    }

    const save = (data) => {
        dispatch(updateAddress(data))
    }

    const loaded = () => {
        return clientAddress.id !==undefined
    }

    const form = () => {
        initialiseForm()

        return (
            <FormProvider {...(methods)}>
                <form onSubmit={methods.handleSubmit(save)}>
                    <Identity name={`id`} control={methods.control} />
                    <FormRowInput name={`thoroughfare`} control={methods.control} title={`Thoroughfare`} />
                    <FormRowInput name={`address_line_1`} control={methods.control} title={`Address Line 1`} />
                    <FormRowInput name={`address_line_2`} control={methods.control} title={`Address Line 2`} />
                    <FormRowInput name={`address_line_3`} control={methods.control} title={`Address Line 3`} />
                    <FormRowInput name={`town`} control={methods.control} title={`Town`} />
                    <FormRowInput name={`county`} control={methods.control} title={`County`} />
                    <FormRowInput name={`postcode`} control={methods.control} title={`Postcode`} />
                    <div className={`form-row`}>
                        <Button variant={`contained`} endIcon={<Save />} type={`submit`} title={`Save`} >
                            Save Address
                        </Button>
                    </div>
                </form>
            </FormProvider>
        )
    }

    return (
        <>{loaded() && form()}</>
    )
}

export default ClientAddressEditData;
