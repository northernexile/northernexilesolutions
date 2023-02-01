
import React from "react";
import {AdapterDayjs} from "@mui/x-date-pickers/AdapterDayjs";
import {Controller} from "react-hook-form";
import {DesktopDatePicker, LocalizationProvider} from "@mui/x-date-pickers";
import {TextField} from "@mui/material";


export default function FormRowInputDate({ name, label, control, apiValue }) {
    return (
        <div className={`form-row`}>
            <Controller
                name={name}
                control={control}
                render={({ field: { onChange, value }, fieldState: { error } }) => (
                    <LocalizationProvider dateAdapter={AdapterDayjs} >
                        <DesktopDatePicker
                            label={label}
                            control={control}
                            inputFormat="DD/MM/YYYY"
                            value={value}
                            defaultValue={apiValue}
                            fullWidth
                            className={ `form-input form-input-text unlocked`}
                            onChange={(event) => { onChange(event); }}
                            renderInput={(params) => <TextField {...params} error={!!error} helperText={error?.message} />}
                        />
                    </LocalizationProvider>
                )} />
        </div>
    )
}
