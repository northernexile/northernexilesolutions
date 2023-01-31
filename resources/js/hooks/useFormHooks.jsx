import Box from "@mui/material/Box";
import Button from "@mui/material/Button";
import {Cancel, Edit, Save} from "@mui/icons-material";
import React, {useState} from "react";

export const useFormHooks = () =>{

    const submitButtons = () => {
        return <Box display={`stack`} justifyContent={`space-between`}>
            <Button style={{marginRight: 2}} endIcon={<Save/>} variant={`contained`} type={`submit`}>Submit</Button>
            <Button endIcon={<Cancel/>} onClick={() => toggleEditable()} variant={`contained`}
                    type={`button`}>Cancel</Button>
        </Box>
    }

    const editButtons = () => {
        return <>
            <Button endIcon={<Edit/>} onClick={() => toggleEditable()} variant={`contained`}
                    type={`button`}>Edit</Button>
        </>
    }

    const isReadOnly = () => {
        return editing === false
    }

    const buttons = () => {
        return isReadOnly() ? editButtons() : submitButtons()
    }

    const [editing, setEditing] = useState(false)

    const toggleEditable = () => {
        setEditing(!editing)
    }

    return {
        isReadOnly,
        buttons
    }
}
