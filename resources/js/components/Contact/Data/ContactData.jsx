import React, {useEffect, useState} from "react"
import MUIDataTable from "mui-datatables"
import Button from "@mui/material/Button";
import {Delete, EditAttributes} from "@mui/icons-material";
import {Link} from "react-router-dom";
import {useAppDispatch, useAppSelector} from "../../../redux/hooks/hooks";
import {getAllContacts,deleteContact} from "../../../redux/actions/contactActions";
import Dates from "../../../snippets/Dates";
import Dialog from "@mui/material/Dialog";
import DialogActions from "@mui/material/DialogActions";
import DialogContent from "@mui/material/DialogContent";
import DialogContentText from "@mui/material/DialogContentText";
import DialogTitle from "@mui/material/DialogTitle";
import Typography from "@mui/material/Typography";

const ContactData = () => {
    const [open,setOpen] = useState(false)
    const [contact,setContact] = useState({})
    const contacts = useAppSelector(state => state.contact.contacts)
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
            name: 'name',
            label: 'Name',
            options: {
                filter: true,
                sort: true
            }
        },
        {
            name: 'email',
            label: 'Email',
            options: {
                filter: true,
                sort: true
            }
        },
        {
            name: 'created_at',
            label: 'Created',
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
        dispatch(getAllContacts())
    }, [])

    const handleOpen = (id) => {
        setOpen(true)
        setContact(findContact(id))
    }

    const handleClose = () => {
        setContact({})
        setOpen(false)
    }

    const deleteObject = () => {
        dispatch(deleteContact(contact))
            .then(()=>dispatch(getAllContacts()))
        setContact({})
        setOpen(false)
    }

    const findContact = (id) => {
        return contacts.find((contact) => {return contact.id === id})
    }

    let data = contacts.map((contact) => {
        return {
            id: contact.id,
            name: contact.name,
            email: contact.email,
            created_at: Dates(contact.created_at, 'DD/MM/Y HH:mm:ss'),
            action: <>
                <Link to={`/dashboard/messages/${contact.id}`}>
                    <Button style={{marginRight:4}} variant={`contained`} endIcon={<EditAttributes/>}
                            title={`Edit contact record id:${contact.id}`}>Edit</Button>
                </Link>
                <Button onClick={() => {handleOpen(contact.id)}} variant={`contained`}
                        endIcon={<Delete />}
                        title={`Delete contact`}>Delete</Button>
            </>
        }
    })

    const dialog = (id) => {
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
                            Really delete message {contact.id}?
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
                title={"Contact form submissions"}
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

export default ContactData;
