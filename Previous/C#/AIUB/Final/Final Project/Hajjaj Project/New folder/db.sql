USE [Hajjaj]
GO
/****** Object:  Table [dbo].[EmployeeManagement]    Script Date: 23-Aug-22 3:12:24 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EmployeeManagement](
	[EmployeeId] [varchar](50) NOT NULL,
	[EmployeeName] [varchar](50) NOT NULL,
	[EmployeeSalary] [int] NOT NULL,
	[PhoneNumber] [varchar](50) NOT NULL,
	[JoiningDate] [varchar](50) NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[MedicineManagement]    Script Date: 23-Aug-22 3:12:24 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[MedicineManagement](
	[MedicineId] [varchar](50) NOT NULL,
	[MedicineName] [varchar](50) NOT NULL,
	[MedicineQuantity] [int] NOT NULL,
	[MedicinePricePerUnit] [int] NOT NULL,
	[MedicineManufacturingDate] [varchar](50) NOT NULL,
	[MedicineExpireDate] [varchar](50) NOT NULL,
 CONSTRAINT [PK_MedicineManagement] PRIMARY KEY CLUSTERED 
(
	[MedicineId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[OrderInformation]    Script Date: 23-Aug-22 3:12:24 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[OrderInformation](
	[OrderedMedicineId] [varchar](50) NOT NULL,
	[OrderedMedicineName] [varchar](50) NOT NULL,
	[OrderedQuantity] [int] NULL,
	[OrderedPerUnitPrice] [int] NULL,
	[OrderedPrice] [int] NULL,
 CONSTRAINT [PK_OrderInformation] PRIMARY KEY CLUSTERED 
(
	[OrderedMedicineId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[UserInfo]    Script Date: 23-Aug-22 3:12:24 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[UserInfo](
	[UserId] [varchar](50) NOT NULL,
	[UserName] [varchar](50) NOT NULL,
	[UserEmail] [varchar](50) NULL,
	[UserPhoneNumber] [varchar](50) NOT NULL,
	[UserAddress] [varchar](50) NOT NULL,
	[JoiningDate] [varchar](50) NOT NULL,
	[UserSalary] [varchar](50) NOT NULL,
	[UserPassword] [varchar](50) NOT NULL
) ON [PRIMARY]
GO
INSERT [dbo].[EmployeeManagement] ([EmployeeId], [EmployeeName], [EmployeeSalary], [PhoneNumber], [JoiningDate]) VALUES (N'E-003', N'Hajjaj', 7000, N'01984321644', N'Sunday, August 21, 2022')
GO
INSERT [dbo].[MedicineManagement] ([MedicineId], [MedicineName], [MedicineQuantity], [MedicinePricePerUnit], [MedicineManufacturingDate], [MedicineExpireDate]) VALUES (N'M-002', N' Ace', 1000, 1, N'Tuesday, August 23, 2022', N'Saturday, August 23, 2025')
INSERT [dbo].[MedicineManagement] ([MedicineId], [MedicineName], [MedicineQuantity], [MedicinePricePerUnit], [MedicineManufacturingDate], [MedicineExpireDate]) VALUES (N'M-003', N'   Histasin', 200, 3, N'Tuesday, August 23, 2022', N'Saturday, August 23, 2025')
INSERT [dbo].[MedicineManagement] ([MedicineId], [MedicineName], [MedicineQuantity], [MedicinePricePerUnit], [MedicineManufacturingDate], [MedicineExpireDate]) VALUES (N'M-004', N'Napa', 100, 5, N'Tuesday, August 23, 2022', N'Tuesday, August 23, 2022')
INSERT [dbo].[MedicineManagement] ([MedicineId], [MedicineName], [MedicineQuantity], [MedicinePricePerUnit], [MedicineManufacturingDate], [MedicineExpireDate]) VALUES (N'M-005', N' Dextopoten', 100, 7, N'Tuesday, August 23, 2022', N'Saturday, August 23, 2025')
INSERT [dbo].[MedicineManagement] ([MedicineId], [MedicineName], [MedicineQuantity], [MedicinePricePerUnit], [MedicineManufacturingDate], [MedicineExpireDate]) VALUES (N'M-006', N'MaxPro', 500, 7, N'Tuesday, August 23, 2022', N'Saturday, August 23, 2025')
INSERT [dbo].[MedicineManagement] ([MedicineId], [MedicineName], [MedicineQuantity], [MedicinePricePerUnit], [MedicineManufacturingDate], [MedicineExpireDate]) VALUES (N'M-007', N'Adovas', 100, 120, N'Tuesday, August 23, 2022', N'Saturday, August 23, 2025')
INSERT [dbo].[MedicineManagement] ([MedicineId], [MedicineName], [MedicineQuantity], [MedicinePricePerUnit], [MedicineManufacturingDate], [MedicineExpireDate]) VALUES (N'M-008', N'Seklo', 500, 7, N'Tuesday, August 23, 2022', N'Saturday, August 23, 2025')
INSERT [dbo].[MedicineManagement] ([MedicineId], [MedicineName], [MedicineQuantity], [MedicinePricePerUnit], [MedicineManufacturingDate], [MedicineExpireDate]) VALUES (N'M-009', N'Kilfat', 50, 98, N'Tuesday, August 23, 2022', N'Friday, August 23, 2024')
INSERT [dbo].[MedicineManagement] ([MedicineId], [MedicineName], [MedicineQuantity], [MedicinePricePerUnit], [MedicineManufacturingDate], [MedicineExpireDate]) VALUES (N'M-010', N'Losectin', 500, 5, N'Tuesday, August 23, 2022', N'Saturday, August 23, 2025')
INSERT [dbo].[MedicineManagement] ([MedicineId], [MedicineName], [MedicineQuantity], [MedicinePricePerUnit], [MedicineManufacturingDate], [MedicineExpireDate]) VALUES (N'M-011', N'Alacot', 500, 15, N'Tuesday, August 23, 2022', N'Friday, August 23, 2024')
INSERT [dbo].[MedicineManagement] ([MedicineId], [MedicineName], [MedicineQuantity], [MedicinePricePerUnit], [MedicineManufacturingDate], [MedicineExpireDate]) VALUES (N'M-012', N'Alarid', 200, 100, N'Tuesday, August 23, 2022', N'Saturday, August 23, 2025')
INSERT [dbo].[MedicineManagement] ([MedicineId], [MedicineName], [MedicineQuantity], [MedicinePricePerUnit], [MedicineManufacturingDate], [MedicineExpireDate]) VALUES (N'M-013', N'Akicin', 500, 48, N'Tuesday, August 23, 2022', N'Saturday, August 23, 2025')
GO
INSERT [dbo].[OrderInformation] ([OrderedMedicineId], [OrderedMedicineName], [OrderedQuantity], [OrderedPerUnitPrice], [OrderedPrice]) VALUES (N'M-001', N' Ace', 9, 2, 400)
INSERT [dbo].[OrderInformation] ([OrderedMedicineId], [OrderedMedicineName], [OrderedQuantity], [OrderedPerUnitPrice], [OrderedPrice]) VALUES (N'M-002', N'Napa', 9, 2, 400)
INSERT [dbo].[OrderInformation] ([OrderedMedicineId], [OrderedMedicineName], [OrderedQuantity], [OrderedPerUnitPrice], [OrderedPrice]) VALUES (N'M-003', N'MaxPro', 9, 5, 400)
GO
INSERT [dbo].[UserInfo] ([UserId], [UserName], [UserEmail], [UserPhoneNumber], [UserAddress], [JoiningDate], [UserSalary], [UserPassword]) VALUES (N'E-001', N' Adnan', N'NULL', N'01345678965', N'Dhaka', N'23-Aug-22', N'100000', N'123')
INSERT [dbo].[UserInfo] ([UserId], [UserName], [UserEmail], [UserPhoneNumber], [UserAddress], [JoiningDate], [UserSalary], [UserPassword]) VALUES (N'E-002', N' Shakil', N'NULL', N'0134678653', N'Dhaka', N'23-Aug-22', N'35653', N'123')
INSERT [dbo].[UserInfo] ([UserId], [UserName], [UserEmail], [UserPhoneNumber], [UserAddress], [JoiningDate], [UserSalary], [UserPassword]) VALUES (N'E-003', N'1123123', N'NULL', N'1', N'Dhaka', N'23-Aug-22', N'1', N'123')
INSERT [dbo].[UserInfo] ([UserId], [UserName], [UserEmail], [UserPhoneNumber], [UserAddress], [JoiningDate], [UserSalary], [UserPassword]) VALUES (N'Admin', N'Admin', N'NULL', N'01705812226', N'Dhaka', N'07-Jul-22', N'asdf', N'Admin')
INSERT [dbo].[UserInfo] ([UserId], [UserName], [UserEmail], [UserPhoneNumber], [UserAddress], [JoiningDate], [UserSalary], [UserPassword]) VALUES (N'E-004', N'Tonmoy Dey', N'NULL', N'01934564321', N'Dhaka', N'07-Oct-22', N'5000', N'123')
GO
