
import React, {useState} from "react"
import Button from "@mui/material/Button";
import {Add, Save} from "@mui/icons-material";
import {FormProvider, useForm} from "react-hook-form";
import FormRowInput from "../../../../controls/rows/FormRowInput";
import {addAddress} from "../../../../redux/actions/addressActions";
import {getAllClientAddresses} from "../../../../redux/actions/clientAddressActions";
import {useAppDispatch} from "../../../../redux/hooks/hooks";

const CreateClientAddress = (id) => {
    const clientId = id
    const dispatch = useAppDispatch();

    const [isEditing,setIsEditing] = useState(false)

    const methods = useForm()

    const startEditing = () => {
        setIsEditing(true)
    }

    const button = () => {
        return (
            <div className={`form-row`}>
                <Button style={{marginBottom:2}} type={`button`} variant={`contained`} endIcon={<Add />} title={`Add Address`} onClick={() => {startEditing()}}>
                    Add Address
                </Button>
            </div>
        )
    }

    const save = (data) => {
        const address = {
            thoroughfare:data.thoroughfare,
            address_line_1:data.address_line_1,
            address_line_2:data.address_line_2,
            address_line_3:data.address_line_3,
            town:data.town,
            county:data.county,
            postcode:data.postcode,
            client_id:clientId.id
        }

        setIsEditing(false)

        dispatch(addAddress(address))
            .then(() => {dispatch(getAllClientAddresses(clientId.id))})
    }

    const form = () => {
        return (
            <FormProvider {...(methods)}>
                <form onSubmit={methods.handleSubmit(save)}>
                    <FormRowInput name={`thoroughfare`} control={methods.control} title={`Thoroughfare`} />
                    <FormRowInput name={`address_line_1`} control={methods.control} title={`Address Line 1`} />
                    <FormRowInput name={`address_line_2`} control={methods.control} title={`Address Line 2`} />
                    <FormRowInput name={`address_line_3`} control={methods.control} title={`Address Line 3`} />
                    <FormRowInput name={`town`} control={methods.control} title={`Town`} />
                    <FormRowInput name={`county`} control={methods.control} title={`County`} />
                    <FormRowInput name={`postcode`} control={methods.control} title={`Postcode`} />
                    <div className={`form-row`}>
                        <Button variant={`contained`} endIcon={<Save />} type={`submit`} title={`Save`} >
                            Save Project
                        </Button>
                    </div>
                </form>
            </FormProvider>
        )
    }

    return (
        (isEditing)
            ? form()
            : button()
    )
}

export default CreateClientAddress;
