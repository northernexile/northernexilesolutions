
import React from "react";
import {Controller, useFormContext} from "react-hook-form";
import {TextField} from "@mui/material";
import PropTypes from "prop-types";

Input.propTypes = {
    name: PropTypes.string,
    label: PropTypes.string,
};
export default function Input({ name, label }) {
    const { control,register } = useFormContext();
    return (
        <Controller
            name={name}
            control={control}
            render={({ field: { onChange, value }, fieldState: { error } }) => (
                    <TextField
                        {...register(name)}
                        label={label}
                        control={control}
                        value={value}
                        fullWidth
                        className={ `form-input form-input-text unlocked`}
                    />

            )} />
    )
}
