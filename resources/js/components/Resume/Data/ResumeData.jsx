import React, {useEffect, useState} from "react"
import MUIDataTable from "mui-datatables"
import Button from "@mui/material/Button";
import {Delete, EditAttributes} from "@mui/icons-material";
import {Link} from "react-router-dom";
import {useAppDispatch, useAppSelector} from "../../../redux/hooks/hooks";
import {getAllExperience,deleteExperience} from "../../../redux/actions/resumeActions";
import Dates from "../../../snippets/Dates";
import Dialog from "@mui/material/Dialog";
import DialogActions from "@mui/material/DialogActions";
import DialogContent from "@mui/material/DialogContent";
import DialogContentText from "@mui/material/DialogContentText";
import DialogTitle from "@mui/material/DialogTitle";
import Typography from "@mui/material/Typography";

const ResumeData = () => {
    const [open,setOpen] = useState(false)
    const [experience,setExperience] = useState({})
    const experiences = useAppSelector(state => state.experience.history)
    const dispatch = useAppDispatch()

    const columns = [
        {
            name: 'id',
            label: 'ID',
            options: {
                filter: true,
                sort: true
            }
        },
        {
            name: 'company',
            label: 'Company',
            options: {
                filter: true,
                sort: true
            }
        },
        {
            name: 'description',
            label: 'Description',
            options: {
                filter: true,
                sort: true
            }
        },
        {
            name: 'start',
            label: 'Start',
            options: {
                filter: true,
                sort: true
            }
        },
        {
            name: 'stop',
            label: 'Stop',
            options: {
                filter: true,
                sort: true
            }
        },
        {
            name: 'action',
            label: 'Action',
            options: {
                filter: false,
                sort: false
            }
        }
    ];

    useEffect(() => {
        dispatch(getAllExperience())
    }, [])

    const handleOpen = (id) => {
        setOpen(true)
        setExperience(findExperience(id))
    }

    const handleClose = () => {
        setExperience({})
        setOpen(false)
    }

    const deleteObject = () => {
        dispatch(deleteExperience(experience))
            .then(()=>dispatch(getAllExperience()))
        setExperience({})
        setOpen(false)
    }

    const findExperience = (id) => {
        return experiences.find((experience) => {return experience.id === id})
    }

    let data = experiences.map((experience) => {
        return {
            id: experience.id,
            name: experience.name,
            created_at: Dates(experience.created_at, 'DD/MM/Y HH:mm:ss'),
            action: <>
                <Link to={`/dashboard/experience/${experience.id}`}>
                    <Button style={{marginRight:4}} variant={`contained`} endIcon={<EditAttributes/>}
                            title={`Edit experience record id:${experience.id}`}>Edit</Button>
                </Link>
                <Button onClick={() => {handleOpen(experience.id)}} variant={`contained`}
                        endIcon={<Delete />}
                        title={`Delete item`}>Delete</Button>
            </>
        }
    })

    const dialog = () => {
        return (
            <Dialog
                open={open}
                onClose={handleClose}
                aria-labelledby="alert-dialog-title"
                aria-describedby="alert-dialog-description"
            >
                <DialogTitle>
                    {"Delete Message"}
                </DialogTitle>
                <DialogContent>
                    <DialogContentText id="alert-dialog-description">
                        <Typography variant="p" component="div">
                            Really delete experience {experience.id}?
                        </Typography>
                    </DialogContentText>
                </DialogContent>
                <DialogActions>
                    <Button variant={`contained`} color={`primary`} onClick={() => {deleteObject()}} autoFocus>
                        Yes
                    </Button>
                    <Button variant={`contained`} color={`secondary`} onClick={() => {handleClose()}}>No</Button>
                </DialogActions>
            </Dialog>
        )
    }

    const options = {
        filterType: 'checkbox',
    };

    const table = () => {
        return (
            <MUIDataTable
                title={"Experience"}
                data={data}
                columns={columns}
                options={options}
            />
        )
    }

    return (
        <>
            {table()}
            {dialog()}
        </>
    )
}

export default ResumeData;
