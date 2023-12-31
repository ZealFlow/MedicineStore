USE [master]
GO
/****** Object:  Database [MedicineStore]    Script Date: 12/25/2023 11:57:06 PM ******/
CREATE DATABASE [MedicineStore]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'MedicineStore', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.SQLEXPRESS\MSSQL\DATA\MedicineStore.mdf' , SIZE = 73728KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'MedicineStore_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.SQLEXPRESS\MSSQL\DATA\MedicineStore_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT, LEDGER = OFF
GO
ALTER DATABASE [MedicineStore] SET COMPATIBILITY_LEVEL = 160
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [MedicineStore].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [MedicineStore] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [MedicineStore] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [MedicineStore] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [MedicineStore] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [MedicineStore] SET ARITHABORT OFF 
GO
ALTER DATABASE [MedicineStore] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [MedicineStore] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [MedicineStore] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [MedicineStore] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [MedicineStore] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [MedicineStore] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [MedicineStore] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [MedicineStore] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [MedicineStore] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [MedicineStore] SET  DISABLE_BROKER 
GO
ALTER DATABASE [MedicineStore] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [MedicineStore] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [MedicineStore] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [MedicineStore] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [MedicineStore] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [MedicineStore] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [MedicineStore] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [MedicineStore] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [MedicineStore] SET  MULTI_USER 
GO
ALTER DATABASE [MedicineStore] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [MedicineStore] SET DB_CHAINING OFF 
GO
ALTER DATABASE [MedicineStore] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [MedicineStore] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [MedicineStore] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [MedicineStore] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
ALTER DATABASE [MedicineStore] SET QUERY_STORE = ON
GO
ALTER DATABASE [MedicineStore] SET QUERY_STORE (OPERATION_MODE = READ_WRITE, CLEANUP_POLICY = (STALE_QUERY_THRESHOLD_DAYS = 30), DATA_FLUSH_INTERVAL_SECONDS = 900, INTERVAL_LENGTH_MINUTES = 60, MAX_STORAGE_SIZE_MB = 1000, QUERY_CAPTURE_MODE = AUTO, SIZE_BASED_CLEANUP_MODE = AUTO, MAX_PLANS_PER_QUERY = 200, WAIT_STATS_CAPTURE_MODE = ON)
GO
USE [MedicineStore]
GO
/****** Object:  Table [dbo].[Image]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Image](
	[ImageID] [int] IDENTITY(1,1) NOT NULL,
	[ProductID] [int] NULL,
	[PathImage] [varchar](250) NULL,
 CONSTRAINT [PK_Image] PRIMARY KEY CLUSTERED 
(
	[ImageID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Unit]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Unit](
	[UnitID] [int] IDENTITY(1,1) NOT NULL,
	[UnitName] [nvarchar](50) NULL,
	[CreatedDate] [datetime] NULL,
 CONSTRAINT [PK_Unit] PRIMARY KEY CLUSTERED 
(
	[UnitID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Brand]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Brand](
	[BrandID] [int] IDENTITY(1,1) NOT NULL,
	[CreatedDate] [datetime] NULL,
	[BrandName] [nvarchar](50) NULL,
 CONSTRAINT [PK_Brand] PRIMARY KEY CLUSTERED 
(
	[BrandID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Category]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Category](
	[CategoryID] [int] IDENTITY(1,1) NOT NULL,
	[CategoryName] [nvarchar](250) NULL,
 CONSTRAINT [PK_Category] PRIMARY KEY CLUSTERED 
(
	[CategoryID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Product]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Product](
	[ProductID] [int] IDENTITY(1,1) NOT NULL,
	[BrandID] [int] NULL,
	[CategoryID] [int] NULL,
	[UnitID] [int] NULL,
	[GrProductID] [int] NULL,
	[SKU] [varchar](50) NULL,
	[ProductName] [nvarchar](250) NULL,
	[Quantity] [int] NULL,
	[Description] [text] NULL,
	[Product_Info] [text] NULL,
	[Status] [int] NULL,
	[CreatedDate] [datetime] NULL,
 CONSTRAINT [PK_Product] PRIMARY KEY CLUSTERED 
(
	[ProductID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  View [dbo].[View_BCIPU]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE VIEW [dbo].[View_BCIPU]
AS
SELECT dbo.Product.*, dbo.Brand.BrandName, dbo.Category.CategoryName, dbo.Unit.UnitName, dbo.Image.PathImage
FROM     dbo.Brand INNER JOIN
                  dbo.Product ON dbo.Brand.BrandID = dbo.Product.BrandID INNER JOIN
                  dbo.Category ON dbo.Product.CategoryID = dbo.Category.CategoryID INNER JOIN
                  dbo.Image ON dbo.Product.ProductID = dbo.Image.ProductID INNER JOIN
                  dbo.Unit ON dbo.Product.UnitID = dbo.Unit.UnitID
GO
/****** Object:  Table [dbo].[Account]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Account](
	[UserID] [int] IDENTITY(1,1) NOT NULL,
	[FullName] [nvarchar](50) NULL,
	[Password] [varchar](32) NULL,
	[Email] [nvarchar](50) NULL,
	[Address] [nvarchar](250) NULL,
	[Phone] [nvarchar](10) NULL,
	[Status] [bit] NULL,
	[Role] [int] NULL,
	[Token] [nvarchar](250) NULL,
 CONSTRAINT [PK_User] PRIMARY KEY CLUSTERED 
(
	[UserID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Admin]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Admin](
	[UserName] [nvarchar](50) NULL,
	[Password] [nvarchar](50) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Cart]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Cart](
	[CartID] [int] NOT NULL,
	[CreatedCart] [int] NULL,
 CONSTRAINT [PK_Cart] PRIMARY KEY CLUSTERED 
(
	[CartID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Cart_Product]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Cart_Product](
	[CartID] [int] NOT NULL,
	[ProductID] [int] NOT NULL,
	[Quantity] [int] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Costs]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Costs](
	[CostID] [int] IDENTITY(1,1) NOT NULL,
	[Cost] [bigint] NULL,
	[CreatedDate] [datetime] NULL,
	[ProductID] [int] NULL,
 CONSTRAINT [PK_Costs] PRIMARY KEY CLUSTERED 
(
	[CostID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Coupon]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Coupon](
	[CouponID] [int] IDENTITY(1,1) NOT NULL,
	[CouponCode] [varchar](250) NULL,
	[StartTime] [datetime] NULL,
	[EndTime] [datetime] NULL,
	[Quantity] [int] NULL,
	[CouponType] [int] NULL,
	[Status] [int] NULL,
	[SalePercent] [int] NULL,
 CONSTRAINT [PK_Coupon] PRIMARY KEY CLUSTERED 
(
	[CouponID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Coupon_User]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Coupon_User](
	[CouponID] [int] NULL,
	[UserID] [int] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Gr_Product]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Gr_Product](
	[GrProductID] [int] IDENTITY(1,1) NOT NULL,
	[CreateDate] [datetime] NULL,
	[GrProductName] [varchar](250) NULL,
 CONSTRAINT [PK_Gr_Product] PRIMARY KEY CLUSTERED 
(
	[GrProductID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[InfoOrder]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[InfoOrder](
	[InfoID] [int] IDENTITY(1,1) NOT NULL,
	[FirstName] [nvarchar](50) NULL,
	[LastName] [nvarchar](50) NULL,
	[Phone] [varchar](50) NULL,
	[Email] [nvarchar](50) NULL,
	[CreatedTime] [datetime] NULL,
 CONSTRAINT [PK_InfoOrder] PRIMARY KEY CLUSTERED 
(
	[InfoID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[OrderDetails]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[OrderDetails](
	[ProductID] [int] NULL,
	[OrderID] [int] NULL,
	[Quantity] [int] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Orders]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Orders](
	[OrderID] [int] IDENTITY(1,1) NOT NULL,
	[InvoiceNumber] [varchar](250) NULL,
	[UserID] [int] NULL,
	[OrderDate] [datetime] NULL,
	[TotalAmount] [bigint] NULL,
	[Status] [int] NULL,
	[CouponID] [int] NULL,
	[ShippingID] [int] NULL,
	[InfoID] [int] NULL,
	[ShippingInfoID] [int] NULL,
 CONSTRAINT [PK_Order] PRIMARY KEY CLUSTERED 
(
	[OrderID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Payment]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Payment](
	[PaymentID] [int] IDENTITY(1,1) NOT NULL,
	[Amount] [bigint] NULL,
	[PaymentDate] [datetime] NULL,
	[PaymentMethod] [nvarchar](50) NULL,
	[Status] [int] NULL,
	[OrderID] [int] NOT NULL,
	[UserID] [int] NOT NULL,
 CONSTRAINT [PK_Payment] PRIMARY KEY CLUSTERED 
(
	[PaymentID] ASC,
	[OrderID] ASC,
	[UserID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Product_Supplier]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Product_Supplier](
	[ProductID] [int] NOT NULL,
	[SupplierID] [int] NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Shipping]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Shipping](
	[ShippingID] [int] IDENTITY(1,1) NOT NULL,
	[ShippingName] [nvarchar](250) NULL,
	[ShippingCost] [bigint] NULL,
	[Description] [nvarchar](250) NULL,
 CONSTRAINT [PK_Shipping] PRIMARY KEY CLUSTERED 
(
	[ShippingID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[ShippingInfo]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ShippingInfo](
	[ShippingInfoID] [int] IDENTITY(1,1) NOT NULL,
	[Address] [nvarchar](250) NULL,
	[City] [nvarchar](250) NULL,
	[District] [nvarchar](250) NULL,
	[Ward] [nvarchar](250) NULL,
	[CreatedTime] [datetime] NULL,
 CONSTRAINT [PK_ShippingInfo] PRIMARY KEY CLUSTERED 
(
	[ShippingInfoID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Supplier]    Script Date: 12/25/2023 11:57:07 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Supplier](
	[SupplierID] [int] NOT NULL,
	[SupplierName] [nvarchar](250) NULL,
	[Delivery_Time] [datetime] NULL,
 CONSTRAINT [PK_Supplier] PRIMARY KEY CLUSTERED 
(
	[SupplierID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[Account] ON 

INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (1, N'Nguyễn Văn Tín', N'Tin18082002', N'tinnguyensp.ict@gmail.com', N'205 Bà Triệu', N'0905467930', 1, 1, NULL)
INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (2, N'Lê Quang Phước', N'Phuoc123456789', N'phuoc.le@gmail.com', N'Âu Lạc', N'0905467892', 1, 1, NULL)
INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (1002, N'Phạm Hùng Xuân Sang', N'Sang123', N'xuan.sang@gmail.com', NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (1038, N'Trần Hữu Nhật Minh', N'ddc83bf88c241349a4211172137545e0', N'minh.tran@gmail.com', NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (1039, N'Lê Phước Thành Nhân', N'1b7bc57caa66d881dc33d6ff216f7c0c', N'nhan@gmail.com', NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (1040, N'Hoàng Công Thành', N'e71af513402dec750fdf1cc595475675', N'thanh.cong@gmail.com', NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (1041, N'Phan Công Khanh', N'1c616c5b446a0c177bbae04359e1f866', N'khanh@gmail.com', NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (1042, N'Tín Nguyễn Văn', N'9b3aa5a70a5297ded0d5505a2d6fe156', N'Tín Nguyễn Văn', NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (1043, N'Tín Nguyễn Văn', N'9b3aa5a70a5297ded0d5505a2d6fe156', N'Tín Nguyễn Văn', NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (1044, N'Tín Nguyễn Văn', N'9b3aa5a70a5297ded0d5505a2d6fe156', N'20t1020110@husc.edu.vn', NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (1045, N'Lê Phước Thành Nhân', N'cd045f6478632fc32923660e1c170cce', N'tinnguyensp.ict@gmail.com', NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (1046, N'Lê Quang Phước', N'dc10cb9ef3cbb3088c4f4aa997406e06', N'tinnguyensp.ict@gmail.com', NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (1047, N'Lê Quang Phước', N'30c2ed4dfa0d0a29b5095c2ca94738cf', N'tinnguyensp.ict@gmail.com', NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (1048, N'Nguyễn Văn A', N'dc10cb9ef3cbb3088c4f4aa997406e06', N'tinnguyensp.ict@gmail.com', NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (1049, N'Nguyễn Văn B', N'dc10cb9ef3cbb3088c4f4aa997406e06', N'a@gmail.com', NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (1050, N'Nguyễn Văn Tín', N'dc10cb9ef3cbb3088c4f4aa997406e06', N'tinnguyensp.ict@gmail.com', NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[Account] ([UserID], [FullName], [Password], [Email], [Address], [Phone], [Status], [Role], [Token]) VALUES (1051, N'Nguyễn Văn Tín', N'73db4ab0f9812e43db11fe58152e18c4', N'tin@gmail.com', NULL, NULL, NULL, NULL, NULL)
SET IDENTITY_INSERT [dbo].[Account] OFF
GO
SET IDENTITY_INSERT [dbo].[Brand] ON 

INSERT [dbo].[Brand] ([BrandID], [CreatedDate], [BrandName]) VALUES (1, NULL, N'Pharmacity')
INSERT [dbo].[Brand] ([BrandID], [CreatedDate], [BrandName]) VALUES (3, NULL, N'Dược Hậu Giang')
INSERT [dbo].[Brand] ([BrandID], [CreatedDate], [BrandName]) VALUES (13, NULL, N'OU Vitale-XD')
SET IDENTITY_INSERT [dbo].[Brand] OFF
GO
INSERT [dbo].[Cart] ([CartID], [CreatedCart]) VALUES (1, NULL)
INSERT [dbo].[Cart] ([CartID], [CreatedCart]) VALUES (2, NULL)
INSERT [dbo].[Cart] ([CartID], [CreatedCart]) VALUES (1041, NULL)
INSERT [dbo].[Cart] ([CartID], [CreatedCart]) VALUES (1044, NULL)
INSERT [dbo].[Cart] ([CartID], [CreatedCart]) VALUES (1049, NULL)
INSERT [dbo].[Cart] ([CartID], [CreatedCart]) VALUES (1051, NULL)
GO
INSERT [dbo].[Cart_Product] ([CartID], [ProductID], [Quantity]) VALUES (1, 1, 48)
INSERT [dbo].[Cart_Product] ([CartID], [ProductID], [Quantity]) VALUES (1, 2, 23)
INSERT [dbo].[Cart_Product] ([CartID], [ProductID], [Quantity]) VALUES (2, 1, 6)
INSERT [dbo].[Cart_Product] ([CartID], [ProductID], [Quantity]) VALUES (2, 2, 3)
INSERT [dbo].[Cart_Product] ([CartID], [ProductID], [Quantity]) VALUES (1041, 1, 15)
INSERT [dbo].[Cart_Product] ([CartID], [ProductID], [Quantity]) VALUES (1041, 2, 1)
INSERT [dbo].[Cart_Product] ([CartID], [ProductID], [Quantity]) VALUES (1044, 1, 2)
INSERT [dbo].[Cart_Product] ([CartID], [ProductID], [Quantity]) VALUES (1049, 67, 1)
INSERT [dbo].[Cart_Product] ([CartID], [ProductID], [Quantity]) VALUES (1051, 67, 1)
INSERT [dbo].[Cart_Product] ([CartID], [ProductID], [Quantity]) VALUES (1051, 1, 1)
GO
SET IDENTITY_INSERT [dbo].[Category] ON 

INSERT [dbo].[Category] ([CategoryID], [CategoryName]) VALUES (1, N'Dược phẩm')
INSERT [dbo].[Category] ([CategoryID], [CategoryName]) VALUES (2, N'Chăm sóc sức khỏe')
INSERT [dbo].[Category] ([CategoryID], [CategoryName]) VALUES (3, N'Chăm sóc cá nhân')
INSERT [dbo].[Category] ([CategoryID], [CategoryName]) VALUES (6, N'Mẹ và bé')
INSERT [dbo].[Category] ([CategoryID], [CategoryName]) VALUES (7, N'Cham sóc sắc đẹp')
INSERT [dbo].[Category] ([CategoryID], [CategoryName]) VALUES (8, N'Thiết bị y tế')
SET IDENTITY_INSERT [dbo].[Category] OFF
GO
SET IDENTITY_INSERT [dbo].[Costs] ON 

INSERT [dbo].[Costs] ([CostID], [Cost], [CreatedDate], [ProductID]) VALUES (43, 67, CAST(N'2023-12-25T16:27:15.753' AS DateTime), 1)
INSERT [dbo].[Costs] ([CostID], [Cost], [CreatedDate], [ProductID]) VALUES (44, 68, CAST(N'2023-12-25T17:15:34.880' AS DateTime), NULL)
INSERT [dbo].[Costs] ([CostID], [Cost], [CreatedDate], [ProductID]) VALUES (45, 68, CAST(N'2023-12-25T17:18:01.623' AS DateTime), NULL)
INSERT [dbo].[Costs] ([CostID], [Cost], [CreatedDate], [ProductID]) VALUES (46, 68, CAST(N'2023-12-25T17:18:41.027' AS DateTime), NULL)
INSERT [dbo].[Costs] ([CostID], [Cost], [CreatedDate], [ProductID]) VALUES (47, 69, CAST(N'2023-12-25T23:19:25.637' AS DateTime), NULL)
SET IDENTITY_INSERT [dbo].[Costs] OFF
GO
SET IDENTITY_INSERT [dbo].[Coupon] ON 

INSERT [dbo].[Coupon] ([CouponID], [CouponCode], [StartTime], [EndTime], [Quantity], [CouponType], [Status], [SalePercent]) VALUES (1, N'HUEIN23', NULL, NULL, NULL, NULL, NULL, 20)
INSERT [dbo].[Coupon] ([CouponID], [CouponCode], [StartTime], [EndTime], [Quantity], [CouponType], [Status], [SalePercent]) VALUES (2, N'HUETRONGTOI', NULL, NULL, NULL, NULL, NULL, 50)
SET IDENTITY_INSERT [dbo].[Coupon] OFF
GO
INSERT [dbo].[Coupon_User] ([CouponID], [UserID]) VALUES (1, 1)
INSERT [dbo].[Coupon_User] ([CouponID], [UserID]) VALUES (1, 2)
INSERT [dbo].[Coupon_User] ([CouponID], [UserID]) VALUES (2, 1)
INSERT [dbo].[Coupon_User] ([CouponID], [UserID]) VALUES (2, 2)
GO
SET IDENTITY_INSERT [dbo].[Gr_Product] ON 

INSERT [dbo].[Gr_Product] ([GrProductID], [CreateDate], [GrProductName]) VALUES (22, CAST(N'2023-12-21T02:28:59.943' AS DateTime), N'PAN-1')
INSERT [dbo].[Gr_Product] ([GrProductID], [CreateDate], [GrProductName]) VALUES (23, CAST(N'2023-12-21T02:41:06.880' AS DateTime), N'PAN-2')
INSERT [dbo].[Gr_Product] ([GrProductID], [CreateDate], [GrProductName]) VALUES (24, CAST(N'2023-12-21T02:42:31.700' AS DateTime), N'PAN-3')
INSERT [dbo].[Gr_Product] ([GrProductID], [CreateDate], [GrProductName]) VALUES (25, CAST(N'2023-12-21T02:51:49.797' AS DateTime), N'PAN-4')
INSERT [dbo].[Gr_Product] ([GrProductID], [CreateDate], [GrProductName]) VALUES (26, CAST(N'2023-12-21T02:59:46.710' AS DateTime), N'PAN-5')
INSERT [dbo].[Gr_Product] ([GrProductID], [CreateDate], [GrProductName]) VALUES (27, CAST(N'2023-12-21T03:06:30.623' AS DateTime), N'PAN-6')
INSERT [dbo].[Gr_Product] ([GrProductID], [CreateDate], [GrProductName]) VALUES (28, CAST(N'2023-12-21T03:08:41.770' AS DateTime), N'PAN-7')
INSERT [dbo].[Gr_Product] ([GrProductID], [CreateDate], [GrProductName]) VALUES (29, CAST(N'2023-12-21T03:32:43.760' AS DateTime), N'PAN-8')
INSERT [dbo].[Gr_Product] ([GrProductID], [CreateDate], [GrProductName]) VALUES (30, CAST(N'2023-12-21T03:36:26.280' AS DateTime), N'PAN-9')
INSERT [dbo].[Gr_Product] ([GrProductID], [CreateDate], [GrProductName]) VALUES (31, CAST(N'2023-12-21T03:41:41.473' AS DateTime), N'Test Name')
INSERT [dbo].[Gr_Product] ([GrProductID], [CreateDate], [GrProductName]) VALUES (32, CAST(N'2023-12-21T03:42:55.123' AS DateTime), N'Test Name-1')
INSERT [dbo].[Gr_Product] ([GrProductID], [CreateDate], [GrProductName]) VALUES (33, CAST(N'2023-12-21T03:44:07.307' AS DateTime), N'PAN-10')
INSERT [dbo].[Gr_Product] ([GrProductID], [CreateDate], [GrProductName]) VALUES (34, CAST(N'2023-12-21T03:45:07.717' AS DateTime), N'Test Name-1')
INSERT [dbo].[Gr_Product] ([GrProductID], [CreateDate], [GrProductName]) VALUES (35, CAST(N'2023-12-21T03:46:23.990' AS DateTime), N'123')
INSERT [dbo].[Gr_Product] ([GrProductID], [CreateDate], [GrProductName]) VALUES (36, CAST(N'2023-12-21T03:47:51.720' AS DateTime), N'Test Name-1')
INSERT [dbo].[Gr_Product] ([GrProductID], [CreateDate], [GrProductName]) VALUES (37, CAST(N'2023-12-21T07:28:33.367' AS DateTime), N'Abbsin')
SET IDENTITY_INSERT [dbo].[Gr_Product] OFF
GO
SET IDENTITY_INSERT [dbo].[Image] ON 

INSERT [dbo].[Image] ([ImageID], [ProductID], [PathImage]) VALUES (1111, 67, N'images_65894af3503f50.51556185.jpg')
INSERT [dbo].[Image] ([ImageID], [ProductID], [PathImage]) VALUES (1112, 68, N'images_65895645933ad6.89773054.jpg')
INSERT [dbo].[Image] ([ImageID], [ProductID], [PathImage]) VALUES (1113, 1, N'images_65895700c84a59.44998368.jpg')
INSERT [dbo].[Image] ([ImageID], [ProductID], [PathImage]) VALUES (1114, 69, N'images_6589ab8d3988c7.01226187.jpg')
SET IDENTITY_INSERT [dbo].[Image] OFF
GO
SET IDENTITY_INSERT [dbo].[InfoOrder] ON 

INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (1, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', NULL)
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (2, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T11:12:40.727' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (3, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T11:15:37.433' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (4, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T11:21:01.137' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (5, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T11:23:26.980' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (6, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T11:26:03.070' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (7, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T11:33:15.823' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (8, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T11:37:31.950' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (9, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T13:55:42.200' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (10, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T13:59:11.080' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (11, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T14:02:21.550' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (12, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T14:04:45.440' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (13, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T14:13:23.317' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (14, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T14:15:09.173' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (15, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T15:20:57.053' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (16, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T15:23:51.370' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (17, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T15:23:59.860' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (18, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T15:27:20.183' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (19, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T15:32:08.937' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (20, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T15:35:55.707' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (21, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T15:39:22.140' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (22, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T15:44:27.937' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (23, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T15:45:53.700' AS DateTime))
INSERT [dbo].[InfoOrder] ([InfoID], [FirstName], [LastName], [Phone], [Email], [CreatedTime]) VALUES (24, N'Tín', N'Nguyễn Văn', N'+84 0905467930', N'tinnguyensp@gmail.com', CAST(N'2023-12-22T16:03:31.120' AS DateTime))
SET IDENTITY_INSERT [dbo].[InfoOrder] OFF
GO
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 2, 4)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 2, 3)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 3, 4)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 3, 3)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 4, 4)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 4, 3)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 5, 3)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 7, 4)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 8, 4)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 9, 4)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 9, 3)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 11, 4)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 12, 47)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 14, 47)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 15, 47)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 15, 22)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 16, 22)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 17, 47)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 18, 22)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 30, 4)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 30, 3)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 31, 3)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 32, 22)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 33, 47)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 35, 47)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 36, 4)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 36, 3)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 37, 4)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 39, 6)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 39, 3)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 5, 4)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 13, 22)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 16, 47)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 18, 47)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 34, 22)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 6, 4)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 6, 3)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 10, 4)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 10, 3)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 11, 3)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 12, 22)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 13, 47)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 14, 22)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 34, 47)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 37, 3)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 7, 3)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 8, 3)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 17, 22)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 31, 4)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (1, 32, 47)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 33, 22)
INSERT [dbo].[OrderDetails] ([ProductID], [OrderID], [Quantity]) VALUES (2, 35, 22)
GO
SET IDENTITY_INSERT [dbo].[Orders] ON 

INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (1, N'INV2312228488', 219800, CAST(N'2023-12-22T07:45:30.240' AS DateTime), 2, 0, NULL, NULL, NULL, NULL)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (2, N'INV2312223706', 219800, CAST(N'2023-12-22T09:18:49.957' AS DateTime), 2, 0, NULL, NULL, NULL, NULL)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (3, N'INV2312224611', 219800, CAST(N'2023-12-22T11:01:42.217' AS DateTime), 2, 0, NULL, NULL, NULL, NULL)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (4, N'INV2312228421', 219800, CAST(N'2023-12-22T11:12:14.047' AS DateTime), 2, 0, NULL, NULL, NULL, NULL)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (5, N'INV2312225949', 219800, CAST(N'2023-12-22T11:20:48.097' AS DateTime), 2, 0, NULL, 1, 2, 2)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (6, N'INV2312228874', 219800, CAST(N'2023-12-22T11:23:18.553' AS DateTime), 2, 0, NULL, NULL, NULL, NULL)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (7, N'INV2312223653', 219800, CAST(N'2023-12-22T11:25:47.600' AS DateTime), 2, 0, NULL, NULL, NULL, NULL)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (8, N'INV2312225703', 219800, CAST(N'2023-12-22T11:33:04.423' AS DateTime), 2, 0, NULL, NULL, NULL, NULL)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (9, N'INV2312229364', 219800, CAST(N'2023-12-22T11:37:24.177' AS DateTime), 2, 0, NULL, NULL, NULL, NULL)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (10, N'INV2312222782', 2, CAST(N'2023-12-22T13:55:26.200' AS DateTime), 219800, 0, NULL, 2, 9, 9)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (11, N'INV2312226071', 2, CAST(N'2023-12-22T13:58:59.757' AS DateTime), 219800, 0, NULL, 2, 10, 10)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (12, N'INV2312220829', 1, CAST(N'2023-12-22T14:02:07.710' AS DateTime), 2495200, 0, NULL, 3, 11, 11)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (13, N'INV2312229414', 1, CAST(N'2023-12-22T14:04:37.123' AS DateTime), 2495200, 0, NULL, 2, 12, 12)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (14, N'INV2312228056', 1, CAST(N'2023-12-22T14:13:14.867' AS DateTime), 2495200, 0, NULL, 2, 13, 13)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (15, N'INV2312223838', 1, CAST(N'2023-12-22T14:15:01.423' AS DateTime), 2495200, 0, NULL, 2, 14, 14)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (16, N'INV2312223608', 1, CAST(N'2023-12-22T14:24:46.597' AS DateTime), 2495200, 0, NULL, NULL, NULL, NULL)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (17, N'INV2312223706', 1, CAST(N'2023-12-22T14:28:52.087' AS DateTime), 2495200, 0, NULL, NULL, NULL, NULL)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (18, N'INV2312221137', 1, CAST(N'2023-12-22T14:41:38.210' AS DateTime), 2495200, 0, NULL, NULL, NULL, NULL)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (30, N'INV2312222561', 2, CAST(N'2023-12-22T15:20:02.283' AS DateTime), 219800, 0, 1, NULL, NULL, NULL)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (31, N'INV2312222305', 2, CAST(N'2023-12-22T15:27:09.883' AS DateTime), 219800, 0, 1, 1, 18, 18)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (32, N'INV2312227884', 1, CAST(N'2023-12-22T15:32:00.107' AS DateTime), 2495200, 0, 1, 2, 19, 19)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (33, N'INV2312226198', 1, CAST(N'2023-12-22T15:35:46.347' AS DateTime), 2495200, 0, 1, 1, 20, 20)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (34, N'INV2312223848', 1, CAST(N'2023-12-22T15:39:10.760' AS DateTime), 2495200, 0, 1, 2, 21, 21)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (35, N'INV2312227001', 1, CAST(N'2023-12-22T15:44:20.497' AS DateTime), 2495200, 0, 2, 3, 22, 22)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (36, N'INV2312220496', 2, CAST(N'2023-12-22T15:45:45.557' AS DateTime), 219800, 0, 2, 2, 23, 23)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (37, N'INV2312225315', 2, CAST(N'2023-12-22T16:03:22.747' AS DateTime), 219800, 0, 1, 2, 24, 24)
INSERT [dbo].[Orders] ([OrderID], [InvoiceNumber], [UserID], [OrderDate], [TotalAmount], [Status], [CouponID], [ShippingID], [InfoID], [ShippingInfoID]) VALUES (39, N'INV2312251640', 2, CAST(N'2023-12-25T21:09:31.123' AS DateTime), 402, 0, 1, NULL, NULL, NULL)
SET IDENTITY_INSERT [dbo].[Orders] OFF
GO
SET IDENTITY_INSERT [dbo].[Payment] ON 

INSERT [dbo].[Payment] ([PaymentID], [Amount], [PaymentDate], [PaymentMethod], [Status], [OrderID], [UserID]) VALUES (1, 233800, CAST(N'2023-12-22T15:45:54.043' AS DateTime), N'Online', 0, 36, 2)
INSERT [dbo].[Payment] ([PaymentID], [Amount], [PaymentDate], [PaymentMethod], [Status], [OrderID], [UserID]) VALUES (2, 233800, CAST(N'2023-12-22T16:03:31.440' AS DateTime), N'Online', 0, 37, 2)
INSERT [dbo].[Payment] ([PaymentID], [Amount], [PaymentDate], [PaymentMethod], [Status], [OrderID], [UserID]) VALUES (3, 233800, CAST(N'2023-12-22T16:04:03.317' AS DateTime), N'Online', 0, 37, 2)
SET IDENTITY_INSERT [dbo].[Payment] OFF
GO
SET IDENTITY_INSERT [dbo].[Product] ON 

INSERT [dbo].[Product] ([ProductID], [BrandID], [CategoryID], [UnitID], [GrProductID], [SKU], [ProductName], [Quantity], [Description], [Product_Info], [Status], [CreatedDate]) VALUES (1, 1, 1, 1, 22, NULL, N'Panadol1', 12, N'giáº£m Ä?au', N'', 1, CAST(N'2023-12-21T03:48:30.640' AS DateTime))
INSERT [dbo].[Product] ([ProductID], [BrandID], [CategoryID], [UnitID], [GrProductID], [SKU], [ProductName], [Quantity], [Description], [Product_Info], [Status], [CreatedDate]) VALUES (2, 13, 1, 1, 37, NULL, N'Abbsin 200', 12, N'OU Vitale-XD (nÆ¡i sáº£n xuáº¥t Vitale Pringi)
Vanapere tee 3, Pringi Viimsi, 74011 Harju County Estonia', N'[{"Sá»? ÄÄ?ng KÃ½":"VN-20441-17"},{"Hoáº¡t Cháº¥t - Ná»?ng Ä?á»?/ hÃ m lÆ°á»£ng":"Acetylcystein - 200 mg"},{"Dáº¡ng BÃ o Cháº¿":"ViÃªn nÃ©n sá»§i bá»t"}]', NULL, CAST(N'2023-12-21T07:37:30.230' AS DateTime))
INSERT [dbo].[Product] ([ProductID], [BrandID], [CategoryID], [UnitID], [GrProductID], [SKU], [ProductName], [Quantity], [Description], [Product_Info], [Status], [CreatedDate]) VALUES (67, 1, 1, 1, 22, NULL, N'Thuốc ngủ', 12, N'Thu?c u?ng d? ng?', N'', 1, CAST(N'2023-12-25T16:27:15.697' AS DateTime))
INSERT [dbo].[Product] ([ProductID], [BrandID], [CategoryID], [UnitID], [GrProductID], [SKU], [ProductName], [Quantity], [Description], [Product_Info], [Status], [CreatedDate]) VALUES (68, 1, 1, 1, 22, NULL, N'123', 12, N'giáº£m Ä?au', N'', 1, CAST(N'2023-12-25T17:15:33.993' AS DateTime))
INSERT [dbo].[Product] ([ProductID], [BrandID], [CategoryID], [UnitID], [GrProductID], [SKU], [ProductName], [Quantity], [Description], [Product_Info], [Status], [CreatedDate]) VALUES (69, 3, 2, 1, 24, NULL, N'Thuốc ngủ 2', 10, N'S?n ph?m thu?c ng?', N'', 1, CAST(N'2023-12-25T23:19:25.490' AS DateTime))
SET IDENTITY_INSERT [dbo].[Product] OFF
GO
SET IDENTITY_INSERT [dbo].[Shipping] ON 

INSERT [dbo].[Shipping] ([ShippingID], [ShippingName], [ShippingCost], [Description]) VALUES (1, N'Express delivery', 30000, NULL)
INSERT [dbo].[Shipping] ([ShippingID], [ShippingName], [ShippingCost], [Description]) VALUES (2, N'Post office', 14000, NULL)
INSERT [dbo].[Shipping] ([ShippingID], [ShippingName], [ShippingCost], [Description]) VALUES (3, N'Self pick-up', 0, NULL)
SET IDENTITY_INSERT [dbo].[Shipping] OFF
GO
SET IDENTITY_INSERT [dbo].[ShippingInfo] ON 

INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (1, N'205/4/3 Bà Triệu', N'46', N'474', N'19792', NULL)
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (2, N'205/4/3 Bà Triệu', N'46', N'474', N'19792', CAST(N'2023-12-22T11:12:40.767' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (3, N'205/4/3 Bà Triệu', N'46', N'474', N'19792', CAST(N'2023-12-22T11:15:37.497' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (4, N'205/4/3 Bà Triệu', N'46', N'474', N'19792', CAST(N'2023-12-22T11:21:01.173' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (5, N'205/4/3 Bà Triệu', N'46', N'476', N'19846', CAST(N'2023-12-22T11:23:27.010' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (6, N'205/4/3 Bà Triệu', N'46', N'480', N'20005', CAST(N'2023-12-22T11:26:03.100' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (7, N'205/4/3 Bà Triệu', N'46', N'480', N'20017', CAST(N'2023-12-22T11:33:15.853' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (8, N'205/4/3 Bà Triệu', N'46', N'480', N'20032', CAST(N'2023-12-22T11:37:31.983' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (9, N'205/4/3 Bà Triệu', N'46', N'479', N'19960', CAST(N'2023-12-22T13:55:42.233' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (10, N'205/4/3 Bà Triệu', N'46', N'478', N'19942', CAST(N'2023-12-22T13:59:11.117' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (11, N'205/4/3 Bà Triệu', N'46', N'478', N'19924', CAST(N'2023-12-22T14:02:21.593' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (12, N'205/4/3 Bà Triệu', N'46', N'476', N'19852', CAST(N'2023-12-22T14:04:45.480' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (13, N'205/4/3 Bà Triệu', N'46', N'477', N'19888', CAST(N'2023-12-22T14:13:23.373' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (14, N'205/4/3 Bà Triệu', N'46', N'', N'', CAST(N'2023-12-22T14:15:09.203' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (15, N'205/4/3 Bà Triệu', N'46', N'480', N'20008', CAST(N'2023-12-22T15:20:57.117' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (16, N'205/4/3 Bà Triệu', N'46', N'478', N'19936', CAST(N'2023-12-22T15:23:51.430' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (17, N'205/4/3 Bà Triệu', N'46', N'478', N'19945', CAST(N'2023-12-22T15:23:59.887' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (18, N'205/4/3 Bà Triệu', N'46', N'480', N'20002', CAST(N'2023-12-22T15:27:20.220' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (19, N'205/4/3 Bà Triệu', N'46', N'479', N'19972', CAST(N'2023-12-22T15:32:08.980' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (20, N'205/4/3 Bà Triệu', N'46', N'478', N'19933', CAST(N'2023-12-22T15:35:55.740' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (21, N'205/4/3 Bà Triệu', N'46', N'478', N'19945', CAST(N'2023-12-22T15:39:22.170' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (22, N'205/4/3 Bà Triệu', N'46', N'478', N'19945', CAST(N'2023-12-22T15:44:27.970' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (23, N'205/4/3 Bà Triệu', N'46', N'480', N'20017', CAST(N'2023-12-22T15:45:53.727' AS DateTime))
INSERT [dbo].[ShippingInfo] ([ShippingInfoID], [Address], [City], [District], [Ward], [CreatedTime]) VALUES (24, N'205/4/3 Bà Triệu', N'46', N'481', N'20083', CAST(N'2023-12-22T16:03:31.150' AS DateTime))
SET IDENTITY_INSERT [dbo].[ShippingInfo] OFF
GO
SET IDENTITY_INSERT [dbo].[Unit] ON 

INSERT [dbo].[Unit] ([UnitID], [UnitName], [CreatedDate]) VALUES (1, N'VND', NULL)
SET IDENTITY_INSERT [dbo].[Unit] OFF
GO
ALTER TABLE [dbo].[Costs] ADD  CONSTRAINT [DF_Costs_CreatedDate]  DEFAULT (getdate()) FOR [CreatedDate]
GO
ALTER TABLE [dbo].[Gr_Product] ADD  CONSTRAINT [DF_Gr_Product_CreateDate]  DEFAULT (getdate()) FOR [CreateDate]
GO
ALTER TABLE [dbo].[InfoOrder] ADD  CONSTRAINT [DF_InfoOrder_CreatedTime]  DEFAULT (getdate()) FOR [CreatedTime]
GO
ALTER TABLE [dbo].[Orders] ADD  CONSTRAINT [DF_Order_OrderDate]  DEFAULT (getdate()) FOR [OrderDate]
GO
ALTER TABLE [dbo].[Orders] ADD  CONSTRAINT [DF_Order_Status]  DEFAULT ((0)) FOR [Status]
GO
ALTER TABLE [dbo].[Payment] ADD  CONSTRAINT [DF_Payment_PaymentDate]  DEFAULT (getdate()) FOR [PaymentDate]
GO
ALTER TABLE [dbo].[Payment] ADD  CONSTRAINT [DF_Payment_PaymentMethod]  DEFAULT (N'Online') FOR [PaymentMethod]
GO
ALTER TABLE [dbo].[Payment] ADD  CONSTRAINT [DF_Payment_Status]  DEFAULT ((0)) FOR [Status]
GO
ALTER TABLE [dbo].[Product] ADD  CONSTRAINT [DF_Product_Status]  DEFAULT ((1)) FOR [Status]
GO
ALTER TABLE [dbo].[Product] ADD  CONSTRAINT [DF_Product_CreatedDate]  DEFAULT (getdate()) FOR [CreatedDate]
GO
ALTER TABLE [dbo].[ShippingInfo] ADD  CONSTRAINT [DF_ShippingInfo_CreatedTime]  DEFAULT (getdate()) FOR [CreatedTime]
GO
ALTER TABLE [dbo].[Supplier] ADD  CONSTRAINT [DF_Supplier_Delivery_Time]  DEFAULT (getdate()) FOR [Delivery_Time]
GO
ALTER TABLE [dbo].[Cart]  WITH CHECK ADD  CONSTRAINT [FK_Cart_Account] FOREIGN KEY([CartID])
REFERENCES [dbo].[Account] ([UserID])
GO
ALTER TABLE [dbo].[Cart] CHECK CONSTRAINT [FK_Cart_Account]
GO
ALTER TABLE [dbo].[Cart_Product]  WITH CHECK ADD  CONSTRAINT [FK_Cart_Product_Cart] FOREIGN KEY([CartID])
REFERENCES [dbo].[Cart] ([CartID])
GO
ALTER TABLE [dbo].[Cart_Product] CHECK CONSTRAINT [FK_Cart_Product_Cart]
GO
ALTER TABLE [dbo].[Cart_Product]  WITH CHECK ADD  CONSTRAINT [FK_Cart_Product_Product] FOREIGN KEY([ProductID])
REFERENCES [dbo].[Product] ([ProductID])
GO
ALTER TABLE [dbo].[Cart_Product] CHECK CONSTRAINT [FK_Cart_Product_Product]
GO
ALTER TABLE [dbo].[Costs]  WITH CHECK ADD  CONSTRAINT [FK_Costs_Product1] FOREIGN KEY([ProductID])
REFERENCES [dbo].[Product] ([ProductID])
GO
ALTER TABLE [dbo].[Costs] CHECK CONSTRAINT [FK_Costs_Product1]
GO
ALTER TABLE [dbo].[Coupon_User]  WITH CHECK ADD  CONSTRAINT [FK_Coupon_User_Account] FOREIGN KEY([UserID])
REFERENCES [dbo].[Account] ([UserID])
GO
ALTER TABLE [dbo].[Coupon_User] CHECK CONSTRAINT [FK_Coupon_User_Account]
GO
ALTER TABLE [dbo].[Coupon_User]  WITH CHECK ADD  CONSTRAINT [FK_Coupon_User_Coupon] FOREIGN KEY([CouponID])
REFERENCES [dbo].[Coupon] ([CouponID])
GO
ALTER TABLE [dbo].[Coupon_User] CHECK CONSTRAINT [FK_Coupon_User_Coupon]
GO
ALTER TABLE [dbo].[Image]  WITH CHECK ADD  CONSTRAINT [FK_Image_Product1] FOREIGN KEY([ProductID])
REFERENCES [dbo].[Product] ([ProductID])
GO
ALTER TABLE [dbo].[Image] CHECK CONSTRAINT [FK_Image_Product1]
GO
ALTER TABLE [dbo].[OrderDetails]  WITH CHECK ADD  CONSTRAINT [FK_OrderDetails_Order] FOREIGN KEY([OrderID])
REFERENCES [dbo].[Orders] ([OrderID])
GO
ALTER TABLE [dbo].[OrderDetails] CHECK CONSTRAINT [FK_OrderDetails_Order]
GO
ALTER TABLE [dbo].[OrderDetails]  WITH CHECK ADD  CONSTRAINT [FK_OrderDetails_Product1] FOREIGN KEY([ProductID])
REFERENCES [dbo].[Product] ([ProductID])
GO
ALTER TABLE [dbo].[OrderDetails] CHECK CONSTRAINT [FK_OrderDetails_Product1]
GO
ALTER TABLE [dbo].[Orders]  WITH CHECK ADD  CONSTRAINT [FK_Order_Coupon] FOREIGN KEY([CouponID])
REFERENCES [dbo].[Coupon] ([CouponID])
GO
ALTER TABLE [dbo].[Orders] CHECK CONSTRAINT [FK_Order_Coupon]
GO
ALTER TABLE [dbo].[Orders]  WITH CHECK ADD  CONSTRAINT [FK_Order_InfoOrder] FOREIGN KEY([InfoID])
REFERENCES [dbo].[InfoOrder] ([InfoID])
GO
ALTER TABLE [dbo].[Orders] CHECK CONSTRAINT [FK_Order_InfoOrder]
GO
ALTER TABLE [dbo].[Orders]  WITH CHECK ADD  CONSTRAINT [FK_Order_Shipping] FOREIGN KEY([ShippingID])
REFERENCES [dbo].[Shipping] ([ShippingID])
GO
ALTER TABLE [dbo].[Orders] CHECK CONSTRAINT [FK_Order_Shipping]
GO
ALTER TABLE [dbo].[Orders]  WITH CHECK ADD  CONSTRAINT [FK_Order_ShippingInfo] FOREIGN KEY([ShippingInfoID])
REFERENCES [dbo].[ShippingInfo] ([ShippingInfoID])
GO
ALTER TABLE [dbo].[Orders] CHECK CONSTRAINT [FK_Order_ShippingInfo]
GO
ALTER TABLE [dbo].[Payment]  WITH CHECK ADD  CONSTRAINT [FK_Payment_Account1] FOREIGN KEY([UserID])
REFERENCES [dbo].[Account] ([UserID])
GO
ALTER TABLE [dbo].[Payment] CHECK CONSTRAINT [FK_Payment_Account1]
GO
ALTER TABLE [dbo].[Payment]  WITH CHECK ADD  CONSTRAINT [FK_Payment_Order1] FOREIGN KEY([OrderID])
REFERENCES [dbo].[Orders] ([OrderID])
GO
ALTER TABLE [dbo].[Payment] CHECK CONSTRAINT [FK_Payment_Order1]
GO
ALTER TABLE [dbo].[Product]  WITH CHECK ADD  CONSTRAINT [FK_Product_Brand] FOREIGN KEY([BrandID])
REFERENCES [dbo].[Brand] ([BrandID])
GO
ALTER TABLE [dbo].[Product] CHECK CONSTRAINT [FK_Product_Brand]
GO
ALTER TABLE [dbo].[Product]  WITH CHECK ADD  CONSTRAINT [FK_Product_Category] FOREIGN KEY([CategoryID])
REFERENCES [dbo].[Category] ([CategoryID])
GO
ALTER TABLE [dbo].[Product] CHECK CONSTRAINT [FK_Product_Category]
GO
ALTER TABLE [dbo].[Product]  WITH CHECK ADD  CONSTRAINT [FK_Product_Gr_Product] FOREIGN KEY([GrProductID])
REFERENCES [dbo].[Gr_Product] ([GrProductID])
GO
ALTER TABLE [dbo].[Product] CHECK CONSTRAINT [FK_Product_Gr_Product]
GO
ALTER TABLE [dbo].[Product]  WITH CHECK ADD  CONSTRAINT [FK_Product_Unit] FOREIGN KEY([UnitID])
REFERENCES [dbo].[Unit] ([UnitID])
GO
ALTER TABLE [dbo].[Product] CHECK CONSTRAINT [FK_Product_Unit]
GO
ALTER TABLE [dbo].[Product_Supplier]  WITH CHECK ADD  CONSTRAINT [FK_Product_Supplier_Product] FOREIGN KEY([ProductID])
REFERENCES [dbo].[Product] ([ProductID])
GO
ALTER TABLE [dbo].[Product_Supplier] CHECK CONSTRAINT [FK_Product_Supplier_Product]
GO
ALTER TABLE [dbo].[Product_Supplier]  WITH CHECK ADD  CONSTRAINT [FK_Product_Supplier_Supplier] FOREIGN KEY([SupplierID])
REFERENCES [dbo].[Supplier] ([SupplierID])
GO
ALTER TABLE [dbo].[Product_Supplier] CHECK CONSTRAINT [FK_Product_Supplier_Supplier]
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPane1', @value=N'[0E232FF0-B466-11cf-A24F-00AA00A3EFFF, 1.00]
Begin DesignProperties = 
   Begin PaneConfigurations = 
      Begin PaneConfiguration = 0
         NumPanes = 4
         Configuration = "(H (1[40] 4[20] 2[20] 3) )"
      End
      Begin PaneConfiguration = 1
         NumPanes = 3
         Configuration = "(H (1 [50] 4 [25] 3))"
      End
      Begin PaneConfiguration = 2
         NumPanes = 3
         Configuration = "(H (1 [50] 2 [25] 3))"
      End
      Begin PaneConfiguration = 3
         NumPanes = 3
         Configuration = "(H (4 [30] 2 [40] 3))"
      End
      Begin PaneConfiguration = 4
         NumPanes = 2
         Configuration = "(H (1 [56] 3))"
      End
      Begin PaneConfiguration = 5
         NumPanes = 2
         Configuration = "(H (2 [66] 3))"
      End
      Begin PaneConfiguration = 6
         NumPanes = 2
         Configuration = "(H (4 [50] 3))"
      End
      Begin PaneConfiguration = 7
         NumPanes = 1
         Configuration = "(V (3))"
      End
      Begin PaneConfiguration = 8
         NumPanes = 3
         Configuration = "(H (1[56] 4[18] 2) )"
      End
      Begin PaneConfiguration = 9
         NumPanes = 2
         Configuration = "(H (1 [75] 4))"
      End
      Begin PaneConfiguration = 10
         NumPanes = 2
         Configuration = "(H (1[66] 2) )"
      End
      Begin PaneConfiguration = 11
         NumPanes = 2
         Configuration = "(H (4 [60] 2))"
      End
      Begin PaneConfiguration = 12
         NumPanes = 1
         Configuration = "(H (1) )"
      End
      Begin PaneConfiguration = 13
         NumPanes = 1
         Configuration = "(V (4))"
      End
      Begin PaneConfiguration = 14
         NumPanes = 1
         Configuration = "(V (2))"
      End
      ActivePaneConfig = 0
   End
   Begin DiagramPane = 
      Begin Origin = 
         Top = 0
         Left = 0
      End
      Begin Tables = 
         Begin Table = "Brand"
            Begin Extent = 
               Top = 7
               Left = 48
               Bottom = 148
               Right = 242
            End
            DisplayFlags = 280
            TopColumn = 0
         End
         Begin Table = "Category"
            Begin Extent = 
               Top = 7
               Left = 290
               Bottom = 126
               Right = 485
            End
            DisplayFlags = 280
            TopColumn = 0
         End
         Begin Table = "Image"
            Begin Extent = 
               Top = 7
               Left = 533
               Bottom = 148
               Right = 727
            End
            DisplayFlags = 280
            TopColumn = 0
         End
         Begin Table = "Product"
            Begin Extent = 
               Top = 7
               Left = 775
               Bottom = 170
               Right = 969
            End
            DisplayFlags = 280
            TopColumn = 0
         End
         Begin Table = "Unit"
            Begin Extent = 
               Top = 7
               Left = 1017
               Bottom = 148
               Right = 1211
            End
            DisplayFlags = 280
            TopColumn = 0
         End
      End
   End
   Begin SQLPane = 
   End
   Begin DataPane = 
      Begin ParameterDefaults = ""
      End
   End
   Begin CriteriaPane = 
      Begin ColumnWidths = 11
         Column = 1440
         Alias = 900
         Table = 1170
         Output = 720
         Append = 1400
         NewValue = 1170
         SortType = 1350
         SortOrder = 1410
         GroupBy = 1350
         Filter = 1350
         Or = 1350
         Or = 1350
         Or = 1350
      ' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'View_BCIPU'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPane2', @value=N'End
   End
End
' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'View_BCIPU'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPaneCount', @value=2 , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'View_BCIPU'
GO
USE [master]
GO
ALTER DATABASE [MedicineStore] SET  READ_WRITE 
GO
