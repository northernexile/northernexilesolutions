
import React, {useState} from "react"
import {TableCell, TableRow} from "@mui/material";
import IconButton from "@mui/material/IconButton";
import {Delete, Edit, Save} from "@mui/icons-material";
import {FormProvider} from "react-hook-form";
import {useForm} from "react-hook-form";
import FormRowInput from "../../../../controls/rows/FormRowInput";
import {useAppDispatch} from "../../../../redux/hooks/hooks";
import {getAllProjectsForExperience, updateProject} from "../../../../redux/actions/projectActions";

const Project = (params) => {
    const methods = useForm();
    let project = params.project;
    const deleteMethod = params.deleteMethod
    const [isEditing,setIsEditing] = useState(false)
    const dispatch = useAppDispatch();

    const toggleEditing = () => {

        setIsEditing(true)
    }

    const saveEditing = () => {
        let value = document.getElementById(getIdDescription()).value
        setIsEditing(false)
        dispatch(updateProject({id:project.id,description:value}))
            .then(()=>{
                let experience = {
                    id:project.experience_id
                }
                dispatch(getAllProjectsForExperience(experience))
            })
    }

    const editOrSaveButton = () => {
        return (isEditing)
            ?   <IconButton onClick={() => saveEditing()}>
                <Save />
            </IconButton>
            : <IconButton onClick={() => toggleEditing()}>
                <Edit />
            </IconButton>
    }

    const deleteHandler = (id) => {
        deleteMethod(id)
    }

    const editableElement = () => {
        return (isEditing)
            ? formElement()
            : project.description
    }

    const getIdDescription = () => {
        return 'description-' + project.id
    }

    const formElement = () => {

        methods.setValue('description',project.description)

        return (
            <FormProvider {...(methods)}>
                <form>
                    <FormRowInput id={getIdDescription()} name={`description`} label={`Description`} control={methods.control} />
                </form>
            </FormProvider>
        )
    }

   return (
       <TableRow>
           <TableCell>{project.id}</TableCell>
           <TableCell>
               {editableElement()}
           </TableCell>
           <TableCell>
               {editOrSaveButton()}
               <IconButton onClick={() => deleteHandler(project.id)}><Delete /></IconButton>
           </TableCell>
       </TableRow>
   )
}

export default Project
