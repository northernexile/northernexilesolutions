
import React, { useEffect, useState} from "react";
import {useParams} from "react-router-dom";
import {useAppDispatch, useAppSelector} from "../../../../redux/hooks/hooks";
import {getAllProjectsForExperience,deleteProject as removeProject} from "../../../../redux/actions/projectActions";
import { TableBody, TableCell, TableContainer, TableHead, TableRow} from "@mui/material";
import Create from "./Create";
import Project from "./Project";
import ConfirmDelete from "../../../../controls/ConfirmDelete";

const Projects = () => {
    let experience = useParams();
    const dispatch = useAppDispatch();
    const projects = useAppSelector(state => state.projects.projects)
    const [open,setOpen] = useState(false)
    const [deletingId,setDeletingId] = useState(null)

    useEffect(()=>{
        dispatch(getAllProjectsForExperience(experience))
    },[])

    const deleteProject = (id) => {
        setDeletingId(id)
        setOpen(true)
    }

    const projectList = () => {
        return (
            <TableContainer className={`table`}>
                <TableHead>
                    <TableRow>
                        <TableCell>ID</TableCell>
                        <TableCell>Description</TableCell>
                        <TableCell>Options</TableCell>
                    </TableRow>
                </TableHead>
                <TableBody>
                    {projects.map((project, index) => (
                        <Project project={project} deleteMethod={deleteProject} />
                    ))}
                </TableBody>
            </TableContainer>
        )
    }

    const closeDialog = () => {
        setDeletingId(null)
        setOpen(false)
    }

    const deleteItem = () => {
        setOpen(false)
        const project = {
            id:deletingId
        }
        dispatch(removeProject(project))
            .then(() => {dispatch(getAllProjectsForExperience(experience))})
    }

    return (
        <>
            <Create  />
            {projectList()}
            <ConfirmDelete
                title={`Delete project`}
                identity={deletingId}
                open={open}
                handleClose={closeDialog}
                handleDelete={deleteItem}
            />
        </>
    )
}

export default Projects
