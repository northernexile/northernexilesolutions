import React from "react";
import {Controller} from "react-hook-form";
import {TextField} from "@mui/material";

export const Identity = ({name,control}) => {
    return (
            <Controller
                control={control}
                name={name}
                render={({
                             field: { onChange, onBlur, value, name, ref }
                             ,formState,
                         }) => (
                             <input type={`hidden`} value={value} name={name} />
                )}
            />
    );
};

export default Identity
