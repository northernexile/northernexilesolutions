
import React, {useState} from "react"
import {Add, Save} from "@mui/icons-material";
import {useParams} from "react-router-dom";
import {FormProvider, useForm} from "react-hook-form";
import FormRowInput from "../../../../controls/rows/FormRowInput";
import Button from "@mui/material/Button";
import {useAppDispatch} from "../../../../redux/hooks/hooks";
import {getAllProjectsForExperience,addProject} from "../../../../redux/actions/projectActions";

const Create = () => {
    const dispatch = useAppDispatch()
    const experience = useParams()

    const [isEditing,setIsEditing] = useState(false)
    const methods = useForm()

    const startEditing = () => {
        setIsEditing(true)
    }

    const save = (data) => {
        const project = {
            experienceId:experience.id,
            description:data.description
        }

        setIsEditing(false)

        dispatch(addProject(project))
            .then(() => {dispatch(getAllProjectsForExperience(experience))})
    }

    const form = () => {
        return (
            <FormProvider {...(methods)}>
                <form onSubmit={methods.handleSubmit(save)}>
                    <FormRowInput name={`description`} control={methods.control} title={`Description`} />
                    <div className={`form-row`}>
                        <Button variant={`contained`} endIcon={<Save />} type={`submit`} title={`Save`} >
                            Save Project
                        </Button>
                    </div>
                </form>
            </FormProvider>
        )
    }

    const button = () => {
        return (
            <div className={`form-row`}>
                <Button style={{marginBottom:2}} type={`button`} variant={`contained`} endIcon={<Add />} title={`Add project`} onClick={() => {startEditing()}}>
                    Add Project
                </Button>
            </div>
        )
    }

    return (
        (isEditing)
            ? form()
            : button()
    )
}

export default Create;
