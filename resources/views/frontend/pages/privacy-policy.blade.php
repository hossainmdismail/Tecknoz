@extends('frontend.layout.legal')

@section('seo_key', 'privacy-policy')
@section('legal_heading', 'Privacy Policy')
@section('title', 'Privacy Policy | Tecknoz')
@section('description', 'Read how Tecknoz handles contact enquiries, newsletter subscriptions, and visitor information.')

@section('legal_body')
  <p>This policy describes the information collected through the Tecknoz website and how to contact us about it.</p>

  <h2>Information you provide</h2>
  <p>The contact form collects your name, email address, phone number, budget, subject, and message. Tecknoz uses this information to respond to your enquiry and follow up about your project. If you subscribe through the footer, Tecknoz stores your email address to manage your subscription and send product updates.</p>

  <h2>Website technology and third-party services</h2>
  <p>The website uses session cookies to support its forms and account features. When analytics or marketing tags are enabled, their providers may collect information about your device and how you use the website. The website also offers links to third-party services, including scheduling and maps. Those providers describe their handling of information in their own privacy notices.</p>

  <h2>Privacy requests</h2>
  <p>Use the <a href="{{ route('contact') }}">Contact page</a> to ask about your information or to request an update, removal, or an end to newsletter communications.</p>
@endsection
