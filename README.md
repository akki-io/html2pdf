<p align="center">
    <img src="https://cdn.akki.ca/html2pdf-bg-dim.png" alt="Hero">
</p>

# html2pdf microservice

html2pdf is a small microservice build using the [lumen](https://lumen.laravel.com/) framework. It utilizes [wkhtmltopdf](https://wkhtmltopdf.org/) for generating pdfs.

The microservice comes as a docker image, and it can be hosted on services that support docker images. The demo is serverless and run on Google Cloud Run.

## Demo
1. Preview PDF from HTML - [Click Here](https://html2pdf.akki.ca/?preview=1&html=%3Clink%20href=%22https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css%22%20rel=%22stylesheet%22%3E%3Ccenter%3E%3Cimg%20src=%22https://cdn.akki.ca/html2pdf-black.png%22%3E%3Ch1%20class=%22mt-5%22%3EThis%20PDF%20Generated%20using%20html2pdf%3C/h1%3E%3Cp%20class=%22lead%20mt-5%22%3ETo%20learn%20more%20%3Ca%20target=%22_blank%22%20href=%22https://github.com/akki-io/html2pdf%22%3Eclick%20here%3C/a%3E%3C/p%3E%3C/center%3E)
2. Preview PDF from URL - [Click Here](https://html2pdf.akki.ca/?preview=1&url=https://en.wikipedia.org/wiki/Main_Page)
3. Download PDF from HTML - [Click Here](https://html2pdf.akki.ca/?filename=custom-html.pdf&html=%3Clink%20href=%22https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css%22%20rel=%22stylesheet%22%3E%3Ccenter%3E%3Cimg%20src=%22https://cdn.akki.ca/html2pdf-black.png%22%3E%3Ch1%20class=%22mt-5%22%3EThis%20PDF%20Generated%20using%20html2pdf%3C/h1%3E%3Cp%20class=%22lead%20mt-5%22%3ETo%20learn%20more%20%3Ca%20target=%22_blank%22%20href=%22https://github.com/akki-io/html2pdf%22%3Eclick%20here%3C/a%3E%3C/p%3E%3C/center%3E)
4. Download PDF from URL - [Click Here](https://html2pdf.akki.ca/?filename=wikipedia.pdf&url=https://en.wikipedia.org/wiki/Main_Page)

## Run Locally using Docker

1. Run the docker image `docker run -it -rm -p 9091:80 gcr.io/akki-ca/html2pdf`
2. Visit `localhost:9091/status`

## Add the service to your `docker-compose.yml` file

You can also add the service to your docker-composer file. 

```shell
    html2pdf:
        image: gcr.io/akki-ca/html2pdf
        ports:
            - "9091:80"
```

## API Documentation

### Status

Get the status of the microservice

#### `GET` `/status`

#### Response

```json
{
    "message": "Request successfully completed."
}
```

### Convert HTML or URL to PDF

#### `GET|POST` `/`

#### Params

| Name | Type | Nullable | Description |
| ----------- | ----------- | ----------- | ----------- |
| url | url | Y | The url that needs to be converted to pdf. |
| html | string | Y/N | It is required if `url` is null or not present. |
| options | array | Y | wkhtmltopdf options - ref [here](https://wkhtmltopdf.org/usage/wkhtmltopdf.txt) |
| preview | boolean | Y | If set to 1 you will return a preview of the generated pdf |
| filename | string | Y | Set the filename of the pdf that will be downloaded |

#### Response

If the request is successful the response will return a preview of the pdf file or as a download depending on the request parameters.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email hello@akki.io instead of using the issue tracker.

## Credits

- [Akki Khare](https://github.com/akki-io)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## References
- [Lumen](https://lumen.laravel.com/)
- [wkhtmltopdf](https://wkhtmltopdf.org/)
- [laravel-snappy](https://github.com/barryvdh/laravel-snappy)
- [Cloud Run](https://cloud.google.com/run)
