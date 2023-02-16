
import React, {useEffect, useState} from "react"
import {useAppDispatch, useAppSelector} from "../../../redux/hooks/hooks";
import {deleteClient, getAllClients} from "../../../redux/actions/clientActions";
import {Link} from "react-router-dom";
import Button from "@mui/material/Button";
import {Delete, EditAttributes} from "@mui/icons-material";
import Dialog from "@mui/material/Dialog";
import DialogTitle from "@mui/material/DialogTitle";
import DialogContent from "@mui/material/DialogContent";
import DialogContentText from "@mui/material/DialogContentText";
import Typography from "@mui/material/Typography";
import DialogActions from "@mui/material/DialogActions";
import MUIDataTable from "mui-datatables";

const ClientsData = () => {
    const [open,setOpen] = useState(false)
    const [client,setClient] = useState({})
    const clients = useAppSelector(state => state.client.clients)
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
            name: 'phone',
            label: 'phone',
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
        dispatch(getAllClients())
    }, [])

    const handleOpen = (id) => {
        setOpen(true)
        setClient(findClient(id))
    }

    const handleClose = () => {
        setClient({})
        setOpen(false)
    }

    const deleteObject = () => {
        dispatch(deleteClient(client))
            .then(()=>dispatch(getAllClients()))
        setClient({})
        setOpen(false)
    }

    const findClient = (id) => {
        return clients.find((client) => {return client.id === id})
    }

    let data = clients.map((client) => {
        return {
            id: client.id,
            name:client.name,
            email: client.email,
            phone: client.phone,
            action: <>
                <Link to={`/dashboard/clients/${client.id}`}>
                    <Button style={{marginRight:4}} variant={`contained`} endIcon={<EditAttributes/>}
                            title={`Edit client record id:${client.id}`}>Edit</Button>
                </Link>
                <Button onClick={() => {handleOpen(client.id)}} variant={`contained`}
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
                            Really delete client {client.id}?
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
                title={"Client"}
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

export default ClientsData
