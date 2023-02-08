import Dialog from "@mui/material/Dialog";
import DialogTitle from "@mui/material/DialogTitle";
import DialogContent from "@mui/material/DialogContent";
import DialogContentText from "@mui/material/DialogContentText";
import Typography from "@mui/material/Typography";
import DialogActions from "@mui/material/DialogActions";
import Button from "@mui/material/Button";
import React from "react";

const ConfirmDelete = (params) => {
    const title = params.title
    const identity = params.identity
    let open = params.open
    const handleClose = params.handleClose
    const handleDelete = params.handleDelete

    const close = () => {
        open = false
        handleClose()
    }

    const deleteItem = () => {
        open = false
        handleDelete()
    }

    return (
        <Dialog
            open={open}
            onClose={handleClose}
            aria-labelledby="alert-dialog-title"
            aria-describedby="alert-dialog-description"
        >
            <DialogTitle>
                {title}
            </DialogTitle>
            <DialogContent>
                <DialogContentText id="alert-dialog-description">
                    <Typography variant="p" component="div">
                        Really delete item id: {identity}?
                    </Typography>
                </DialogContentText>
            </DialogContent>
            <DialogActions>
                <Button variant={`contained`} color={`primary`} onClick={() => deleteItem()} autoFocus>
                    Yes
                </Button>
                <Button variant={`contained`} color={`secondary`} onClick={() => close()}>No</Button>
            </DialogActions>
        </Dialog>
    )
}

export default ConfirmDelete
