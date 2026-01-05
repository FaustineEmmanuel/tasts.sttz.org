# TASTS-2025 Summit Website

## Overview

This is a professional website for the **1st Tanzania Sustainable Tourism and Innovation Summit (TASTS-2025)**, scheduled for September 19, 2025. The site serves as an event landing page with speaker information, event details, registration functionality, and post-event activity listings. The project appears to be in a transitional state - it contains both a legacy PHP/static HTML implementation and a modern React/Express/PostgreSQL stack.

## User Preferences

Preferred communication style: Simple, everyday language.

## System Architecture

### Frontend Architecture
- **Modern Stack**: React with TypeScript, built using Vite
- **UI Components**: shadcn/ui component library with Radix UI primitives
- **Styling**: Tailwind CSS with custom theme configuration extending the design system
- **State Management**: TanStack React Query for server state
- **Form Handling**: React Hook Form with Zod validation via @hookform/resolvers
- **Path Aliases**: `@/` maps to `client/src/`, `@shared/` maps to `shared/`

### Backend Architecture
- **Runtime**: Node.js with Express.js
- **Language**: TypeScript (ESM modules)
- **API Pattern**: RESTful endpoints served from the Express server
- **Email**: Nodemailer configured for registration confirmations
- **Build Tool**: esbuild for server bundling, Vite for client

### Data Storage
- **Database**: PostgreSQL via Drizzle ORM
- **Schema Location**: `shared/schema.ts` - shared between frontend and backend
- **Migrations**: Managed via drizzle-kit, output to `./migrations`
- **Validation**: Drizzle-Zod for generating Zod schemas from database schema

### Project Structure Pattern
```
client/           # React frontend application
  src/
    components/   # UI components
    lib/          # Utilities
    hooks/        # Custom React hooks
server/           # Express backend
shared/           # Shared types and schema (used by both client and server)
migrations/       # Database migrations
```

### Build & Development
- **Development**: `npm run dev` runs the TypeScript server directly with tsx
- **Production Build**: Vite builds client to `dist/public`, esbuild bundles server to `dist/index.cjs`
- **Type Checking**: `npm run check` runs TypeScript compiler

## External Dependencies

### Database
- **PostgreSQL**: Primary database, connection via `DATABASE_URL` environment variable
- **Drizzle ORM**: Query builder and schema management
- **connect-pg-simple**: Session storage in PostgreSQL

### Email Service
- **Nodemailer**: Email sending for registration confirmations
- **Recipient**: Currently configured to send to `faustineemmanuel0601@gmail.com`

### UI Libraries
- **Radix UI**: Full suite of accessible, unstyled UI primitives
- **shadcn/ui**: Pre-built component patterns using Radix + Tailwind
- **Embla Carousel**: Carousel/slider functionality
- **cmdk**: Command palette component

### Development Tools
- **Vite**: Frontend build tool with React plugin
- **Replit Plugins**: Runtime error overlay, cartographer, and dev banner for Replit environment
- **PostCSS + Autoprefixer**: CSS processing for Tailwind

### Authentication (Available)
- **Passport.js**: Authentication middleware with passport-local strategy
- **express-session**: Session management
- **memorystore**: In-memory session store option