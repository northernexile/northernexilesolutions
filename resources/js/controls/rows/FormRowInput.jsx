import React from "react";
import {Controller} from "react-hook-form";
import {TextField} from "@mui/material";

export const FormRowInput = ({name, label,control}) => {
    return (
        <div className={`form-row`}>
            <Controller
                control={control}
                name={name}
                render={({
                             field: { onChange, onBlur, value, name, ref }
                             ,formState,
                         }) => (
                    <TextField
                        type="text"
                        variant="outlined"
                        onChange={onChange}
                        onBlur={onBlur}
                        name={name}
                        value={value}
                        label={label}
                        fullWidth
                        className={`form-input form-input-text unlocked`}
                    />
                )}
            />
        </div>
    );
};

export default FormRowInput
