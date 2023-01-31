
import React from "react";
import {AdapterDayjs} from "@mui/x-date-pickers/AdapterDayjs";
import {Controller, useFormContext} from "react-hook-form";
import {DesktopDatePicker, LocalizationProvider} from "@mui/x-date-pickers";
import {TextField} from "@mui/material";
import PropTypes from "prop-types";

InputDate.propTypes = {
    name: PropTypes.string,
    label: PropTypes.string,
};
export default function InputDate({ name, label }) {
    const { control,register } = useFormContext();
    return (
        <Controller
            name={name}
            control={control}
            render={({ field: { onChange, value }, fieldState: { error } }) => (

                <LocalizationProvider dateAdapter={AdapterDayjs} >
                    <DesktopDatePicker
                        {...register(name)}
                        label={label}
                        control={control}
                        inputFormat="DD-MM-YYYY"
                        value={value}
                        fullWidth
                        className={ `form-input form-input-text unlocked`}
                        onChange={(event) => { onChange(event); }}
                        renderInput={(params) => <TextField {...params} error={!!error} helperText={error?.message} />}
                    />
                </LocalizationProvider>
            )} />
    )
}
