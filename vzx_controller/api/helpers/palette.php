<?php

function palette_get_number_of_palettes(): int|bool
{
    $request = new request();
    $request->action = action_t::palette_get_number_of_palettes;
    $response = vzx_controller_api_call($request);

    if ($response instanceof response)
        return $response->integer_1;

    return FALSE;
}

function palette_get_information(int $palette_index): response|bool
{
    $request = new request();
    $request->action = action_t::palette_get_palette_info;
    $request->integer_1 = $palette_index;

    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
    {
        return $response;
    }

    return FALSE;
}

function palette_current_palette_set(string $palette_handle): bool
{
    $request = new request();
    $request->action = action_t::palette_current_palette_set;
    $request->string_1 = $palette_handle;

    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
        return TRUE;

    return FALSE;
}

function palette_get_color_information(string $palette_handle, int $color_index): response|bool
{
    $request = new request();
    $request->action = action_t::palette_get_color_info;
    $request->string_1 = $palette_handle;
    $request->integer_1 = $color_index;

    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
    {
        return $response;
    }

    return FALSE;
}

function palette_set_color(
    string $palette_handle,
    string $color_handle,
    float $color_h,
    float $color_s,
    float $color_v
): bool
{
    $request = new request();
    $request->action = action_t::palette_set_color;
    $request->string_1 = $palette_handle;
    $request->string_2 = $color_handle;
    $request->double_1 = $color_h;
    $request->double_2 = $color_s;
    $request->double_3 = $color_v;

    $response = vzx_controller_api_call($request);
    if ($response instanceof response)
        return TRUE;

    return FALSE;
}
