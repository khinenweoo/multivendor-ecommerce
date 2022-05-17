<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="color-scheme" content="light">
<meta name="supported-color-schemes" content="light">
<style>
		*{
			box-sizing: border-box;
		}

		body {
			margin: 0;
			padding: 0;
		}

		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: inherit !important;
		}

		#MessageViewBody a {
			color: inherit;
			text-decoration: none;
		}

		p {
			line-height: inherit
		}

		@media (max-width:700px) {
			.icons-inner {
				text-align: center;
			}

			.icons-inner td {
				margin: 0 auto;
			}

			.fullMobileWidth,
			.row-content {
				width: 100% !important;
			}

			.image_block img.big {
				width: auto !important;
			}

			.column .border,
			.mobile_hide {
				display: none;
			}

			.stack .column {
				width: 100%;
				display: block;
			}

			.mobile_hide {
				min-height: 0;
				max-height: 0;
				max-width: 0;
				overflow: hidden;
				font-size: 0px;
			}
		}
		@media only screen and (max-width: 600px) {
			.inner-body {
			width: 100% !important;
			}

			.footer {
			width: 100% !important;
			}
		}

		@media only screen and (max-width: 500px) {
			.button {
			width: 100% !important;
			}
		}
</style>
</head>
<body style="background-color: #f4e8d4; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
{{ $header ?? '' }}

<!-- Email Body -->
<tr>
<td width="100%" cellpadding="0" cellspacing="0">
<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<!-- Body content -->
<tr>
<td style="font-size:0px;line-height:0px" align="center">
<table width="100%" cellspacing="0" cellpadding="0">
<tbody><tr>
<td style="border-top:8px solid #009383;font-size:0px;line-height:0px">
  &nbsp;
</td>
</tr>
</tbody>
</table>
</td>
</tr>

<tr>
<td width="100%" cellspacing="0">
<table width="100%" cellspacing="0" cellpadding="0">
<tbody><tr>
<td style="padding:5% 0px 2.5%">
<table style="text-align:center;min-width:100%" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td align="center">
<a href="" target="_blank" >
<img class="m_-8719615981714003664partnerLogo CToWUd" src="{{ asset('frontend/images/mail/mplogo.png') }}" style="display:block;height:auto;text-align:center;padding:0px;border:0px;background-color:#ffffff;max-width:220px;" >
</a>  
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>

<tr>
<td width="100%" cellspacing="0">
<table width="100%" cellspacing="0" cellpadding="0">
<tbody><tr>
<td style="padding:5% 0px 6%">
<table style="text-align:center;min-width:100%" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="width:100%;padding-right:0px;padding-left:0px;padding-top:0px;">
<div align="center" style="line-height:10px"><a href="www.example.com" style="outline:none" tabindex="-1" target="_blank"><img alt="" src="https://explorerresearch.com/wp-content/uploads/2021/03/v-commerce-and-the-future-of-retail-2650x900.jpg" style="display: block; height: auto; border: 0; width: 100%; max-width: 500px;" /></a></div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>



<tr>
<td class="content-cell" style="padding:0!important;">
{{ Illuminate\Mail\Markdown::parse($slot) }}

{{ $subcopy ?? '' }}
</td>
</tr>
</table>
</td>
</tr>

{{ $footer ?? '' }}
</table>
</td>
</tr>
</table>
</body>
</html>
