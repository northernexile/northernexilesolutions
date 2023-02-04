import Dialog from "@mui/material/Dialog";
import DialogTitle from "@mui/material/DialogTitle";
import DialogContent from "@mui/material/DialogContent";
import DialogContentText from "@mui/material/DialogContentText";
import Typography from "@mui/material/Typography";
import DialogActions from "@mui/material/DialogActions";
import Button from "@mui/material/Button";
import React from "react";

const ConfirmDelete = (title,identity,open,handleClose = ()=>{},handleDelete = ()=>{}) => {
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
                        Really delete message {identity}?
                    </Typography>
                </DialogContentText>
            </DialogContent>
            <DialogActions>
                <Button variant={`contained`} color={`primary`} onClick={() => {handleDelete}} autoFocus>
                    Yes
                </Button>
                <Button variant={`contained`} color={`secondary`} onClick={() => {handleClose}}>No</Button>
            </DialogActions>
        </Dialog>
    )
}

export default ConfirmDelete
