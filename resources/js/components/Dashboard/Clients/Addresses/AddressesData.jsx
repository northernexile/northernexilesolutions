
import React, {useEffect, useState} from "react"
import {useAppDispatch, useAppSelector} from "../../../../redux/hooks/hooks";
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
import {getAllClientAddresses,deleteClientAddress} from "../../../../redux/actions/clientAddressActions";

const AddressesData = ({clientId}) => {
    const id = clientId;
    const [open,setOpen] = useState(false)
    const [clientAddress,setClientAddress] = useState({})
    const clientAddresses = useAppSelector(state => state.clientAddress.clientAddresses)
    const dispatch = useAppDispatch()

    console.log(clientAddresses)

    useEffect(()=>{
        getAllClientAddresses(id)
    },[])

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
            name: 'address',
            label: 'Address',
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
        dispatch(getAllClientAddresses(id))
    }, [])

    const handleOpen = (id) => {
        setOpen(true)
        setClientAddress(findClientAddress(id))
    }

    const handleClose = () => {
        setClientAddress({})
        setOpen(false)
    }

    const deleteObject = () => {
        dispatch(deleteClientAddress(clientAddress))
            .then(()=>dispatch(getAllClientAddresses(id)))
        setClientAddress({})
        setOpen(false)
    }

    const findClientAddress = (id) => {
        return clientAddresses.find((client) => {return client.id === id})
    }

    let data = clientAddresses.map((client) => {
        return {
            id: client.id,
            address:client.address,
            action: <>
                <Link to={`/dashboard/clients/addresses/${client.id}`}>
                    <Button style={{marginRight:4}} variant={`contained`} endIcon={<EditAttributes/>}
                            title={`Edit client address record id:${client.id}`}>Edit</Button>
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
                            Really delete client address {clientAddress.id}?
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

export default AddressesData
