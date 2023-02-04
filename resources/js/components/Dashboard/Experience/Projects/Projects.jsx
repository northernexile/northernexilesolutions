
import React, { useEffect, useState} from "react";
import {useParams} from "react-router-dom";
import {useAppDispatch, useAppSelector} from "../../../../redux/hooks/hooks";
import {addProject, getAllProjectsForExperience, updateProject} from "../../../../redux/actions/projectActions";
import {Alert, Paper, TableBody, TableCell, TableContainer, TableHead, TableRow} from "@mui/material";
import Button from "@mui/material/Button";
import {Add, Cancel, Delete, Edit, Save} from "@mui/icons-material";
import {FormProvider, useForm} from "react-hook-form";
import FormRowInput from "../../../../controls/rows/FormRowInput";
import Identity from "../../../../controls/Identity";
import IconButton from "@mui/material/IconButton";

const Projects = () => {
    let experience = useParams();
    const dispatch = useAppDispatch()
    const methods = useForm();
    const { handleSubmit, control, setValue} = methods;
    const projects = useAppSelector(state => state.projects.projects)
    const [editing, setEditing] = useState(false);
    const [editingItem,setEditingItem] = useState(null)


    useEffect(()=>{
        setValue('experienceId',experience.id)
        dispatch(getAllProjectsForExperience(experience))
    },[])

    const handleProjectDelete = (id) => {
        console.log(id)
    }

    const handleProjectEdit = (id) => {
        setEditingItem(id)
    }

    const handleProjectEditSave = (id) =>{
        let editDescriptionValue = document.getElementById('description').value

        const payload = {
            id:id,
            description:editDescriptionValue
        }

        submitUpdate(payload)
    }

    const submitUpdate = (data) => {
        dispatch(updateProject(data))
            .then(() => {
                setEditingItem(null)
                dispatch(getAllProjectsForExperience(experience))
            })
    }

    const projectDescription = (id,description) => {
        setValue('description',description)
        return (parseInt(editingItem) === parseInt(id))
            ? <FormProvider {...methods}>
                <form ref={editForm}  onSubmit={handleSubmit(submitUpdate)}>
                    <FormRowInput id={`description`} name={'descriptionEdit'} label={`description`} control={control} />
                </form>
        </FormProvider>

            : description
    }

    const saveEdit = (id) => {
        return (parseInt(editingItem) === parseInt(id))
            ? <IconButton onClick={() => handleProjectEditSave(id)} style={{marginRight:3}}>
                <Save />
              </IconButton>
            : <IconButton onClick={() => handleProjectEdit(id)} style={{marginRight:3}}>
                <Edit />
            </IconButton>
    }

    const projectList = () => {
        return (
            <TableContainer className={`table`} style={{width:'100%',minWidth:'500px'}}
                component={Paper}
            >
                <TableHead>
                    <TableRow>
                        <TableCell>ID</TableCell>
                        <TableCell>Description</TableCell>
                        <TableCell>Actions</TableCell>
                    </TableRow>
                </TableHead>
                <TableBody>
                    {projects.map((project) => (
                        <TableRow
                            key={project.id}
                        >
                            <TableCell>{project.id}</TableCell>
                            <TableCell>{projectDescription(project.id,project.description)}</TableCell>
                            <TableCell>
                                {saveEdit(project.id)}
                                <IconButton onClick={() => handleProjectDelete(project.id)}><Delete /></IconButton>
                            </TableCell>
                        </TableRow>
                    ))}
                </TableBody>
            </TableContainer>
        )
    }

    const toggleEditingProject = () => {
        setEditing(prevEditing => !prevEditing);
    }

    const noProjects = () => {
        return (
            <Alert variant={`outlined`} severity="info">No project detail attached</Alert>
        )
    }

    const createForm = () => {

        return (
            (editing)
                ? editableRow()
                :<></>
        )
    }

    const editableRow = () => {
        return (<FormRowInput control={control} name={`description`} label={`Project description`} />)
    }

    const createProject = (data) => {
        dispatch(addProject(data))
            .then(()=>dispatch(getAllProjectsForExperience(experience.id))
            )
    }

    const createButton = () => {
        return (
            <>
                <FormProvider {...methods}>
                    <form onSubmit={handleSubmit(createProject)}>
                        <Identity name={`experienceId`} control={control}/>
                        {createForm()}
                        {(!editing)
                            ? <></>
                            : <><Button
                                endIcon={<Save />}
                                style={{marginBottom:3,marginRight:3}}
                                variant={`contained`}
                                color={`primary`}
                                type={`submit`}
                            >Save</Button>
                            <Button
                            type={`button`}
                            style={{marginBottom:4}}
                            onClick={()=>toggleEditingProject()}
                            variant={`contained`}
                            color={`secondary`}
                            title={`cancel`}
                            endIcon={<Cancel />}
                            >Cancel</Button> </>
                        }

                    </form>
                </FormProvider>
                {(!editing)
                    ? <Button
                        type={`button`}
                        style={{marginBottom:4}}
                        onClick={()=>toggleEditingProject()}
                        variant={`contained`}
                        color={`primary`}
                        title={`Add project`}
                        endIcon={<Add />}
                    >Add Project</Button>
                    : <></>
                }

            </>
        )
    }

    const handleClose = () => {

    }

    const deleteObject = () => {

    }


    return (
        <>
            {createButton()}
            {(projects.length) ? projectList() : noProjects()}
        </>
    )
}

export default Projects
