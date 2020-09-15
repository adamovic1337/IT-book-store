-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2020 at 09:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it-ebooks`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `idAuthor` int(11) NOT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`idAuthor`, `full_name`) VALUES
(1, 'Mikael Olsson'),
(2, 'Benjamin Perkins'),
(3, 'Jacob Vibe Hammer'),
(4, 'Jon D. Reid'),
(5, 'Daniel Solis'),
(6, 'Cal Schrotenboer'),
(7, 'Andrew Troelsen'),
(8, 'Philip Japikse'),
(9, 'Joseph Albahari'),
(10, 'Ben Albahari'),
(11, 'Greg Lukosek'),
(12, 'James Bender'),
(13, 'Jeff McWherter'),
(14, 'Dirk Strauss'),
(15, 'Adam Freeman'),
(16, 'Benjamin J. Evans'),
(17, 'David Flanagan'),
(18, 'Tony Gaddis'),
(19, 'Adam L. Davis'),
(20, 'Dhanji R. Prasanna'),
(21, 'Jeff Friesen'),
(22, 'Joyce Farrell'),
(23, 'Barry Burd'),
(24, 'Josh Juneau'),
(25, 'Bauke Scholtz'),
(26, 'Arjan Tijms'),
(27, 'Jonathan Wetherbee'),
(28, 'Massimo Nardone'),
(29, 'Chirag Rathod'),
(30, 'Raghu Kodali'),
(31, 'Kyle Simpson'),
(32, 'David Herman'),
(33, 'Nicholas C. Zakas'),
(34, 'Jon Duckett'),
(35, 'Matt Zandstra'),
(36, 'Robin Nixon'),
(37, 'Oliver Michalski'),
(38, 'Stefano Demiliani'),
(39, 'Rob Aley'),
(40, 'Antonio Lopez'),
(41, 'Sai Srinivas Sriparasa'),
(42, 'Francesco Trucchia'),
(43, 'Jacopo Romei'),
(44, 'Sohail Salehi'),
(45, 'Matt Stauffer'),
(46, 'Altaf Hussain'),
(47, 'Eugene Agafonov');

-- --------------------------------------------------------

--
-- Table structure for table `author_book`
--

CREATE TABLE `author_book` (
  `idAuthorBook` int(11) NOT NULL,
  `idAuthor` int(11) NOT NULL,
  `idBook` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author_book`
--

INSERT INTO `author_book` (`idAuthorBook`, `idAuthor`, `idBook`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 3),
(6, 6, 3),
(7, 7, 4),
(8, 8, 4),
(9, 9, 5),
(10, 10, 5),
(11, 11, 6),
(12, 12, 7),
(13, 13, 7),
(14, 14, 8),
(15, 47, 9),
(16, 15, 10),
(17, 16, 11),
(18, 17, 11),
(19, 18, 12),
(20, 19, 13),
(21, 20, 14),
(22, 21, 15),
(23, 22, 16),
(24, 23, 17),
(25, 24, 18),
(26, 25, 19),
(27, 26, 19),
(28, 27, 20),
(29, 28, 20),
(30, 29, 20),
(31, 30, 20),
(32, 31, 21),
(33, 31, 22),
(34, 31, 23),
(35, 31, 24),
(36, 31, 25),
(37, 31, 26),
(38, 32, 27),
(39, 33, 28),
(40, 33, 29),
(41, 34, 30),
(42, 35, 31),
(43, 36, 32),
(44, 37, 33),
(45, 38, 33),
(46, 39, 34),
(47, 40, 35),
(48, 41, 36),
(49, 42, 37),
(50, 43, 37),
(51, 44, 38),
(52, 45, 39),
(53, 46, 40);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `idBook` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `idImage` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`idBook`, `idCategory`, `idImage`, `name`, `description`, `isbn`, `price`) VALUES
(1, 1, 2, 'C# 7 Quick Syntax Reference: A Pocket Guide to the Language, Apis, and Library', 'This quick C# 7 guide is a condensed code and syntax reference to the C# programming language, updated with the latest features of C# 7.3 for .NET and Windows 10. It presents the essential C# 7 syntax in a well-organized format that can be used as a handy reference. In the C# 7 Quick Syntax Reference, you will find a concise reference to the C# language syntax: short, simple, and focused code examples; a well laid out table of contents; and a comprehensive index allowing easy review. You won\'t find any technical jargon, bloated samples, drawn-out history lessons, or witty stories. What you will find is a language reference that is concise, to the point, and highly accessible. The book is packed with useful information and is a must-have for any C# programmer.', '978-1484238165', '29.99'),
(2, 1, 3, 'Beginning C# 7 Programming with Visual Studio 2017', 'Easily get started programming using the ultra-versatile C# 7 and Visual Studio 2017 Beginning C# 7 Programming with Visual Studio 2017 is the beginner\'s ultimate guide to the world\'s most popular programming language. Whether you\'re new to programming entirely, or just new to C#, there has never been a better time to get started. The new C# 7 and Visual Studio 2017 updates feature a number of new tools and features that streamline the workflow, simplify the code, and make it easier than ever to build high-quality apps. This book walks you through everything you need to know, starting from the very basics, to have you programming in no time. You\'ll learn about variables, flow control, and object oriented programming, then move into Web and Windows programming as well as databases and XML. The companion website provides downloadable code examples, and practical Try It Out sections provide explicit, step-by-step instructions for writing your own useful, customizable code. C# 7 can be used to build Windows applications, program Windows 10, and write Web apps when used alongside ASP.NET. With programming skills becoming de rigueur in fields far beyond the tech world, C# 7 is a great place to start building versatile, helpful skills. This book gets you started quickly and easily with instruction from a master-team of C# programmers.', '978-1119458685', '55.00'),
(3, 1, 4, 'Illustrated C# 7', 'Get to work quickly with C# with a uniquely succinct and visual format used to present the C# 7.0 language. Whether you\'re getting to grips with C# for the first time or working to deepen your understanding, you\'ll find this book to be a clear and refreshing take on each aspect of the language. Figures are of prime importance in this book. While teaching programming seminars, Daniel Solis found that he could almost watch the light bulbs going on over the students\' heads as he drew the figures on the whiteboard. In this text, he has distilled each important concept into simple but accurate illustrations. For this latest edition, Dan is joined by fellow experienced teacher and programmer, Cal Schrotenboer, to bring you the very latest C# language features, along with an understanding of the frameworks it most often lives in: .NET and the new .NET Core. For something as intricate and precise as a programming language, there must be text as well as figures. But rather than long, wordy explanations, the authors use short, concise descriptions and bullet lists to make each important piece of information visually distinct and memorable.', '978-1484232873', '49.99'),
(4, 1, 5, 'Pro C# 7: With .NET and .NET Core', 'This essential classic title provides a comprehensive foundation in the C# programming language and the frameworks it lives in. Now in its 8th edition, you\'ll find all the very latest C# 7.1 and .NET 4.7 features here, along with four brand new chapters on Microsoft\'s lightweight, cross-platform framework, .NET Core, up to and including .NET Core 2.0. Coverage of ASP.NET Core, Entity Framework (EF) Core, and more, sits alongside the latest updates to .NET, including Windows Presentation Foundation (WPF), Windows Communication Foundation (WCF), and ASP.NET MVC. Dive in and discover why Pro C# has been a favorite of C# developers worldwide for over 15 years. Gain a solid foundation in object-oriented development techniques, attributes and reflection, generics and collections as well as numerous advanced topics not found in other texts (such as CIL opcodes and emitting dynamic assemblies). With the help of this book you’ll have the confidence to put C# into practice and explore the .NET universe on your own terms.', '978-1484230176', '59.99'),
(5, 1, 6, 'C# 7.0 Pocket Reference: Instant Help for C# 7.0 Programmers', 'When you need answers for programming with C# 7.0, this tightly focused reference tells you exactly what you need to know without long introductions or bloated examples. Easy-to-browse and ideal as a quick reference, this guide will help experienced C#, Java, and C++ programmers get up to speed with the latest version of the C# language. All programs and code snippets in this book are available as interactive samples in LINQPad. You can edit these samples and instantly see the results without needing to set up projects in Visual Studio. Written by the authors of C# 7.0 in a Nutshell, this pocket reference covers C# 7.0 without skimping on detail.', '978-1491988534', '19.99'),
(6, 1, 7, 'Learning C# by Developing Games with Unity 5.x', 'Unity is a cross-platform game engine that is used to develop 2D and 3D video games. Unity 5 is the latest version, released in March 2015, and adds a real-time global illumination to the games, and its powerful new features help to improve a game\'s efficiency. This book will get you started with programming behaviors in C# so you can create 2D games in Unity. You will begin by installing Unity and learning about its features, followed by creating a C# script. We will then deal with topics such as unity scripting for you to understand how codes work so you can create and use C# variables and methods. Moving forward, you will find out how to create, store, and retrieve data from collection of objects. You will also develop an understanding of loops and their use, and you\'ll perform object-oriented programming. This will help you to turn your idea into a ready-to-code project and set up a Unity project for production. Finally, you will discover how to create the GameManager class to manage the game play loop, generate game levels, and develop a simple UI for the game. By the end of this book, you will have mastered the art of applying C# in Unity.', '978-1785287596', '44.99'),
(7, 1, 8, 'Professional Test Driven Development with C#: Developing Real World Applications with TDD', 'Hands-on guidance to creating great test-driven development practice Test-driven development (TDD) practice helps developers recognize a well-designed application, and encourages writing a test before writing the functionality that needs to be implemented. This hands-on guide provides invaluable insight for creating successful test-driven development processes. With source code and examples featured in both C# and .NET, the book walks you through the TDD methodology and shows how it is applied to a real-world application. You\'ll witness the application built from scratch and details each step that is involved in the development, as well as any problems that were encountered and the solutions that were applied.', '978-0470643204', '44.99'),
(8, 1, 9, 'C# Programming Cookbook', 'During your application development workflow, there is always a moment when you need to get out of a tight spot. Through a recipe-based approach, this book will help you overcome common programming problems and get your applications ready to face the modern world. We start with C# 6, giving you hands-on experience with the new language features. Next, we work through the tasks that you perform on a daily basis such as working with strings, generics, and lots more. Gradually, we move on to more advanced topics such as the concept of object-oriented programming, asynchronous programming, reactive extensions, and code contracts. You will learn responsive high performance programming in C# and how to create applications with Azure. Next, we will review the choices available when choosing a source control solution. At the end of the book, we will show you how to create secure and robust code, and will help you ramp up your skills when using the new version of C# 6 and Visual Studio.', '978-1786467300', '37.43'),
(9, 1, 10, 'Multithreading with C# Cookbook', 'Multi-core processors are synonymous with computing speed and power in today\'s world, which is why multithreading has become a key concern for C# developers. Multithreaded code helps you create effective, scalable, and responsive applications. This is an easy-to-follow guide that will show you difficult programming problems in context. You will learn how to solve them with practical, hands-on, recipes. With these recipes, you\'ll be able to start creating your own scalable and reliable multithreaded applications. Starting from learning what a thread is, we guide you through the basics and then move on to more advanced concepts such as task parallel libraries, C# asynchronous functions, and much more. Rewritten to the latest C# specification, C# 6, and updated with new and modern recipes to help you make the most of the hardware you have available, this book will help you push the boundaries of what you thought possible in C#.', '978-1785881251', '34.99'),
(10, 1, 11, 'Pro ASP.NET Core MVC 2', 'Now in its 7th edition, the best selling book on MVC is updated for ASP.NET Core MVC 2. It contains detailed explanations of the Core MVC functionality which enables developers to produce leaner, cloud optimized and mobile-ready applications for the .NET platform. This book puts ASP.NET Core MVC into context and dives deep into the tools and techniques required to build modern, cloud optimized extensible web applications. All the new MVC features are described in detail and the author explains how best to apply them to both new and existing projects. The ASP.NET Core MVC Framework is the latest evolution of Microsoft\'s ASP.NET web platform, built on a completely new foundation. It represents a fundamental change to how Microsoft constructs and deploys web frameworks and is free of the legacy of earlier technologies such as Web Forms. ASP.NET Core MVC provides a \"host agnostic\" framework and a high-productivity programming model that promotes cleaner code architecture, test-driven development, and powerful extensibility. Best-selling author Adam Freeman has thoroughly revised this market-leading book and explains how to get the most from ASP.NET Core MVC. He starts with the nuts-and-bolts and shows you everything through to advanced features, going in-depth to give you the knowledge you need. The book includes a fully worked case study of a functioning web application that readers can use as a template for their own projects.', '978-1484231494', '39.36'),
(11, 2, 12, 'Java in a Nutshell: A Desktop Quick Reference', 'This updated edition of Java in a Nutshell not only helps experienced Java programmers get the most out of Java versions 9 through 11, it\'s also a learning path for new developers. Chock full of examples that demonstrate how to take complete advantage of modern Java APIs and development best practices, this thoroughly revised book includes new material on Java Concurrency Utilities. The book\'s first section provides a fast-paced, no-fluff introduction to the Java programming language and the core runtime aspects of the Java platform. The second section is a reference to core concepts and APIs that explains how to perform real programming work in the Java environment.', '978-1492037255', '35.49'),
(12, 2, 13, 'Starting Out with Java Early Objects', 'Tony Gaddis\'s accessible, step-by-step presentation helps beginning students understand the important details necessary to become skilled programmers at an introductory level. Gaddis motivates the study of both programming skills and the Java programming language by presenting all the details needed to understand the \"how\" and the \"why\" but never losing sight of the fact that most beginners struggle with this material. His approach is both gradual and highly accessible, ensuring that students understand the logic behind developing high-quality programs.', '978-1292076041', '76.54'),
(13, 2, 14, 'Reactive Streams in Java', 'Get an easy introduction to reactive streams in Java to handle concurrency, data streams, and the propagation of change in today\'s applications. This compact book includes in-depth introductions to RxJava, Akka Streams, and Reactor, and integrates the latest related features from Java 9 and 11, as well as reactive streams programming with the Android SDK. Reactive Streams in Java explains how to manage the exchange of stream data across an asynchronous boundary passing elements on to another thread or thread-pool while ensuring that the receiving side is not forced to buffer arbitrary amounts of data which can reduce application efficiency. After reading and using this book, you\'ll be proficient in programming reactive streams for Java in order to optimize application performance, and improve memory management and data exchanges.', '978-1484241752', '23.12'),
(14, 2, 15, 'Dependency Injection', 'Dependency Injection is an in-depth guide to the current best practices forusing the Dependency Injection pattern-the key concept in Spring and therapidly-growing Google Guice. It explores Dependency Injection, sometimescalled Inversion of Control, in fine detail with numerous practical examples.Developers will learn to apply important techniques, focusing on their strengthsand limitations, with a particular emphasis on pitfalls, corner-cases, and bestpractices. This book is written for developers and architects who want to understandDependency Injection and successfully leverage popular DI technologies such asSpring, Google Guice, PicoContainer, and many others. The book exploresmany small examples of anchor concepts and unfolds a larger example to showthe big picture. Written primarily from a Java point-of-view, this book is appropriate for anydeveloper with a working knowledge of object-oriented programming in Java,Ruby, or C#.', '978-1933988559', '33.91'),
(15, 2, 16, 'Java XML and JSON: Document Processing for Java SE', 'Use this guide to master the XML metalanguage and JSON data format along with significant Java APIs for parsing and creating XML and JSON documents from the Java language. New in this edition is coverage of Jackson (a JSON processor for Java) and Oracle\'s own Java API for JSON processing (JSON-P), which is a JSON processing API for Java EE that also can be used with Java SE. This new edition of Java XML and JSON also expands coverage of DOM and XSLT to include additional API content and useful examples. All examples in this book have been tested under Java 11. In some cases, source code has been simplified to use Java 11\'s var language feature. The first six chapters focus on XML along with the SAX, DOM, StAX, XPath, and XSLT APIs. The remaining six chapters focus on JSON along with the mJson, GSON, JsonPath, Jackson, and JSON-P APIs. Each chapter ends with select exercises designed to challenge your grasp of the chapter\'s content. An appendix provides the answers to these exercises.', '978-1484243299', '35.18'),
(16, 2, 17, 'Java Programming', 'Discover the power of Java for developing applications today when you trust the engaging, hands-on approach in Farrell\'s JAVA PROGRAMMING, 9E. Even if you\'re a first-time programmer, JAVA PROGRAMMING can show you how to quickly start developing useful programs, all while still mastering the basic principles of structured and object-oriented programming. Unique, reader-friendly explanations and meaningful programming exercises emphasize business applications and game creation while useful debugging exercises and contemporary case problems further expand your understanding. Additional digital learning resources within MindTap provide interactive learning tools as well as coding IDE (Integrated Development Environment) labs for practicing and expanding your skills.', '978-1285856919', '69.00'),
(17, 2, 18, 'Java For Dummies', 'If you want to learn to speak the world\'s most popular programming language like a native, Java For Dummies is your ideal companion. With a focus on reusing existing code, it quickly and easily shows you how to create basic Java objects, work with Java classes and methods, understand the value of variables, learn to control program flow with loops or decision-making statements, and so much more! Java is everywhere, runs on almost any computer, and is the engine that drives the coolest applications. Written for anyone who\'s ever wanted to tackle programming with Java but never knew quite where to begin, this bestselling guide is your ticket to success! Featuring updates on everything you\'ll encounter in Java 9 and brimming with tons of step-by-step instruction it\'s the perfect resource to get you up and running with Java in a jiffy!', '978-1119235552', '19.50'),
(18, 2, 19, 'Java EE 8 Recipes: A Problem-Solution Approach', 'Quickly find solutions to dozens of common programming problems with the Java Enterprise Edition Platform for small business web applications, enterprise database applications, and microservices solutions. Content is presented in the popular problem-solution format. Look up the programming problem that you want to solve. Read the solution. Apply the solution directly in your own code. Problem solved! Java EE 8 Recipes provides you with effective and proven solutions that can be used to accomplish just about any task that you may encounter. You can feel confident using the reliable solutions that are demonstrated in this book in your personal or corporate environment. Java is a mature programming language that has been refined over the years into a productive and lucrative language for those with the skills to wield it. One result of this years-long refining process is that that the language carries forward many older feature sets that no longer represent the best way of getting work accomplished. You can rest assured that Java EE 8 Recipes provides solutions using the most current approaches implemented in the most current Java Enterprise technologies, including JSON-P 1.1, JSF 2.3, and JAX-RS 2.1.', '978-1484235935', '49.27'),
(19, 2, 20, 'The Definitive Guide to JSF in Java EE 8: Building Web Applications with JavaServer Faces', 'Learn and master the new features in the JSF 2.3 MVC web framework in this definitive guide written by two of the JavaServer Faces (JSF) specification leads. The authors take you through real-world examples that demonstrate how these new features are used with other APIs in Java EE 8. You\'ll see the new and exciting ways JSF applications can use to communicate between a client and a server, such as using WebSockets, invoking bean methods directly from Ajax, executing client-side JavaScript when Ajax calls complete, and more Along the way you\'ll broaden your knowledge of JSF components and web APIs best practices, and learn a great deal about the internals of JSF and the design decisions that have been made when building the JSF API. For example, you\'ll see what artefacts are now CDI injectable, how CDI changed JSF internally, and what some of the caveats are when working with the CDI versions of a JSF artefact.', '978-1484233863', '34.85'),
(20, 2, 21, 'Beginning EJB in Java EE 8: Building Applications with Enterprise JavaBeans', 'Build powerful back-end business logic and complex Enterprise JavaBeans (EJB)-based applications using Java EE 8, Eclipse Enterprise for Java (EE4J), Web Tools Project (WTP), and the Microprofile platform. Targeted at Java and Java EE developers, with or without prior EJB experience, this book is packed with practical insights, strategy tips, and code examples. As each chapter unfolds, you\'ll see how you can apply the new EJB spec to your own applications through specific examples. Beginning EJB in Java EE 8 serves not only as a reference, but also as a how-to guide and repository of practical examples to which you can refer as you build your own applications. It will help you harness the power of EJBs and take your Java EE 8 development to the next level. You\'ll gain the knowledge and skills you\'ll need to create the complex enterprise applications that run today\'s transactions and more.', '978-1484235720', '39.00'),
(21, 3, 22, 'You Don\'t Know JS: Up & Going', 'I\'s easy to learn parts of JavaScript, but much harder to learn it completely or even sufficiently whether you\'re new to the language or have used it for years. With the \"You Don\'t Know JS\" book series, you\'ll get a more complete understanding of JavaScript, including trickier parts of the language that many experienced JavaScript programmers simply avoid. The series\' first book, Up & Going, provides the necessary background for those of you with limited programming experience. By learning the basic building blocks of programming, as well as JavaScript\'s core mechanisms, you\'ll be prepared to dive into the other, more in-depth books in the series-and be well on your way toward true JavaScript. With this book you will: Learn the essential programming building blocks, including operators, types, variables, conditionals, loops, and functions Become familiar with JavaScript\'s core mechanisms such as values, function closures, this, and prototypes Get an overview of other books in the series and learn why it\'s important to understand all parts of JavaScript.', '978-1491924464', '9.99'),
(22, 3, 23, 'You Don\'t Know JS: Scope & Closures', 'No matter how much experience you have with JavaScript, odds are you don\'t fully understand the language. This concise yet in-depth guide takes you inside scope and closures, two core concepts you need to know to become a more efficient and effective JavaScript programmer. You\'ll learn how and why they work, and how an understanding of closures can be a powerful part of your development skillset. Like other books in the \"You Don\'t Know JS\" series, Scope and Closures dives into trickier parts of the language that many JavaScript programmers simply avoid. Armed with this knowledge, you can achieve true JavaScript mastery. Learn about scope, a set of rules to help JavaScript engines locate variables in your code Go deeper into nested scope, a series of containers for variables and functions Explore function- and block-based scope, \"hoisting,\" and the patterns and benefits of scope-based hiding Discover how to use closures for synchronous and asynchronous tasks, including the creation of JavaScript libraries.', '978-1449335588', '13.91'),
(23, 3, 24, 'You Don\'t Know JS: this & Object Prototypes', 'No matter how much experience you have with JavaScript, odds are you don\'t fully understand the language. This concise, in-depth guide takes you inside JavaScript\'s this structure and object prototypes. You\'ll learn how they work and why they\'re integral to behavior delegation--a design pattern in which objects are linked, rather than cloned. Like other books in the \"You Don\'t Know JS\" series, this and Object Prototypes dives into trickier parts of the language that many JavaScript programmers simply avoid. Armed with this knowledge, you can become a true JavaScript master. With this book you will: Explore how the this binding points to objects based on how the function is called Look into the nature of JS objects and why you\'d need to point to them Learn how developers use the mixin pattern to fake classes in JS Examine how JS\'s prototype mechanism forms links between objects Learn how to move from class/inheritance design to behavior delegation Understand how the OLOO (objects-linked-to-other-objects) coding style naturally implements behavior delegation.', '978-1491904152', '19.58'),
(24, 3, 25, 'You Don\'t Know JS: Types & Grammar', 'No matter how much experience you have with JavaScript, odds are you don\'t fully understand the language. As part of the \"You Don\'t Know JS\" series, this compact guide explores JavaScript types in greater depth than previous treatments, defining the problems of coercion, demonstrating why types work, and showing developers how to take advantage of those features. The type system in JavaScript is subject to several misconceptions. Many developers believe that JavaScript has no types, but that\'s not the case. JavaScript uses a number of types behind the scenes, and has a sophisticated system of implicit and explicit coercion between the various types. This book gives you the complete story. Like other books in this series, \"You Don\'t Know JS: Types & Grammar\" dives into trickier parts of the language that many JavaScript programmers simply avoid. Armed with this knowledge, you can achieve true JavaScript mastery.', '978-1491904190', '19.18'),
(25, 3, 26, 'You Don\'t Know JS: Async & Performance', 'No matter how much experience you have with JavaScript, odds are you don\'t fully understand the language. As part of the \"You Don\'t Know JS\" series, this concise yet in-depth guide focuses on new asynchronous features and performance techniques--including Promises, generators, and Web Workers--that let you create sophisticated single-page web applications and escape callback hell in the process. Like other books in this series, You Don\'t Know JS: Async & Performance dives into trickier parts of the language that many JavaScript programmers simply avoid. Armed with this knowledge, you can become a true JavaScript master. With this book you will: Explore old and new JavaScript methods for handling asynchronous programming Understand how callbacks let third parties control your program\'s execution Address the \"inversion of control\" issue with JavaScript Promises Use generators to express async flow in a sequential, synchronous-looking fashion Tackle program-level performance with Web Workers, SIMD, and asm.js Learn valuable resources and techniques for benchmarking and tuning your expressions and statements.', '978-1491904220', '22.02'),
(26, 3, 27, 'You Don\'t Know JS: ES6 & Beyond', 'No matter how much experience you have with JavaScript, odds are you don\'t fully understand the language. As part of the \"You Don\'t Know JS\" series, this compact guide focuses on new features available in ECMAScript 6 (ES6), the latest version of the standard upon which JavaScript is built. Like other books in this series, You Don\'t Know JS: ES6 & Beyond dives into trickier parts of the language that many JavaScript programmers either avoid or know nothing about. Armed with this knowledge, you can achieve true JavaScript mastery. With this book, you will: Learn new ES6 syntax that eases the pain points of common programming idioms Organize code with iterators, generators, modules, and classes Express async flow control with Promises combined with generators Use collections to work more efficiently with data in structured ways Leverage new API helpers, including Array, Object, Math, Number, and String Extend your program\'s capabilities through meta programming Preview features likely coming to JS beyond ES6.', '978-1491904244', '16.82'),
(27, 3, 28, 'Effective JavaScript: 68 Specific Ways to Harness the Power of JavaScript', '\"It\'s uncommon to have a programming language wonk who can speak in such comfortable and friendly language as David does. His walk through the syntax and semantics of JavaScript is both charming and hugely insightful; reminders of gotchas complement realistic use cases, paced at a comfortable curve. You\'ll find when you finish the book that you\'ve gained a strong and comprehensive sense of mastery.\" --Paul Irish, developer advocate, Google Chrome \"This is not a book for those looking for shortcuts; rather it is hard-won experience distilled into a guided tour. It\'s one of the few books on JS that I\'ll recommend without hesitation.\" --Alex Russell, TC39 member, software engineer, Google In order to truly master JavaScript, you need to learn how to work effectively with the language\'s flexible, expressive features and how to avoid its pitfalls. No matter how long you\'ve been writing JavaScript code, Effective JavaScript will help deepen your understanding of this powerful language, so you can build more predictable, reliable, and maintainable programs. Author David Herman, with his years of experience on Ecma\'s JavaScript standardization committee, illuminates the language\'s inner workings as never before--helping you take full advantage of JavaScript\'s expressiveness. Reflecting the latest versions of the JavaScript standard, the book offers well-proven techniques and best practices you\'ll rely on for years to come. Effective JavaScript is organized around 68 proven approaches for writing better JavaScript, backed by concrete examples. You\'ll learn how to choose the right programming style for each project, manage unanticipated problems, and work more successfully with every facet of JavaScript programming from data structures to concurrency.', '978-0321812186', '39.31'),
(28, 3, 29, 'Professional JavaScript for Web Developers', 'Dispels the myth that JavaScript is a \"baby\" language and demonstrates why it is the scripting language of choice used in the design of millions of Web pages and server-side applications Quickly covers JavaScript basics and then moves on to more advanced topics such as object-oriented programming, XML, Web services, and remote scripting Addresses the many issues that Web application developers face, including internationalization, security, privacy, optimization, intellectual property issues, and obfuscation Builds on the reader\'s basic understanding of HTML, CSS, and the Web in general This book is also available as part of the 4-book JavaScript and Ajax Wrox Box.', '978-0764579080', '8.54'),
(29, 3, 30, 'The Principles of Object-Oriented JavaScript', 'If you\'ve used a more traditional object oriented language, such as C++ or Java, JavaScript probably doesn\'t seem object-oriented at all. It has no concept of classes, and you don\'t even need to define any objects in order to write code. But don\'t be fooled JavaScript is an incredibly powerful and expressive object-oriented language that puts many design decisions right into your hands. In The Principles of Object-Oriented JavaScript, Nicholas C. Zakas thoroughly explores JavaScript\'s object-oriented nature, revealing the language\'s unique implementation of inheritance and other key characteristics. You\'ll learn: The difference between primitive and reference values What makes JavaScript functions so unique The various ways to create objects How to define your own constructors How to work with and understand prototypes Inheritance patterns for types and objects. The Principles of Object-Oriented JavaScript will leave even experienced developers with a deeper understanding of JavaScript. Unlock the secrets behind how objects work in JavaScript so you can write clearer, more flexible, and more efficient code.', '978-1593275402', '19.96'),
(30, 3, 31, 'JavaScript and JQuery: Interactive Front-End Web Development', 'This full-color book adopts a visual approach to teaching JavaScript & jQuery, showing you how to make web pages more interactive and interfaces more intuitive through the use of inspiring code examples, infographics, and photography. The content assumes no previous programming experience, other than knowing how to create a basic web page in HTML & CSS. You\'ll learn how to achieve techniques seen on many popular websites (such as adding animation, tabbed panels, content sliders, form validation, interactive galleries, and sorting data)..Introduces core programming concepts in JavaScript and jQueryUses clear descriptions, inspiring examples, and easy-to-follow diagramsTeaches you how to create scripts from scratch, and understand the thousands of JavaScripts, JavaScript APIs, and jQuery plugins that are available on the webDemonstrates the latest practices in progressive enhancement, cross-browser compatibility, and when you may be better off using CSS3 If you\'re looking to create more enriching web experiences and express your creativity through code, then this is the book for you.', '978-1118531648', '25.44'),
(31, 4, 32, 'PHP Objects, Patterns and Practice', 'PHP 5\'s object-oriented enhancements are among the most significant improvements in the 10+ year history of the language. This book introduces you to those features and the many opportunities they provide, as well as a number of tools that will help you maximize development efforts. The book begins with a broad overview of PHP 5\'s object-oriented features, introducing key topics like class declaration, object instantiation, inheritance, and method and property encapsulation. You\'ll also learn about advanced topics including static methods and properties, abstract classes, interfaces, exception handling, object cloning, and more. You\'ll also benefit from an extensive discussion regarding object-oriented design best practices. The next part of the book is devoted to a topic that is often a natural extension of any object-oriented introduction: design patterns. PHP 5 is particularly well-suited to the deployment of these solutions for commonly occurring programming problems. The author will introduce pattern concepts and show you how to implement several key patterns in your PHP applications. The last segment introduces a number of great utilities that help you document, manage, test, and build your PHP applications, including Phing, PHPUnit2, phpDocumentor, PEAR, and CVS.', '978-1430229254', '28.99'),
(32, 4, 33, 'Learning PHP, MySQL & JavaScript: With jQuery, CSS & HTML5', 'Build interactive, data-driven websites with the potent combination of open source technologies and web standards, even if you have only basic HTML knowledge. In this update to this popular hands-on guide, you\'ll tackle dynamic web programming with the latest versions of today\'s core technologies: PHP, MySQL, JavaScript, CSS, HTML5, and key jQuery libraries. Web designers will learn how to use these technologies together and pick up valuable web programming practices along the way including how to optimize websites for mobile devices. At the end of the book, you\'ll put everything together to build a fully functional social networking site suitable for both desktop and mobile browsers.', '978-1491978917', '30.60'),
(33, 4, 34, 'Implementing Azure Cloud Design Patterns', 'The world is moving away from bulky, unreliable, and high-maintenance PHP applications, to small, easy-to-maintain and highly available microservices and the pressing need is for PHP developers to understand the criticalities in building effective microservices that scale at large. This book will be a reliable resource, and one that will help you to develop your skills and teach you techniques for building reliable. Who This Book Is For: PHP developers who want to build scalable, highly available, and secure applications will find this book useful. No knowledge of microservices is assumed.', '978-1788393362', '39.99'),
(34, 4, 35, 'Pro Functional PHP Programming', 'Bring the power of functional programming to your PHP applications. From performance optimizations to concurrency, improved testability to code brevity, functional programming has a host of benefits when compared to traditional imperative programming. Part one of Pro Functional PHP Programming takes you through the basics of functional programming, outlining the key concepts and how they translate into standard PHP functions and code. Part two takes this theory and shows you the strategies for implementing it to solve real problems in your new or existing PHP applications. Functional programming is popular in languages such as Lisp, Scheme and Clojure, but PHP also contains all you need to write functional code. This book will show you how to take advantage of functional programming in your own projects, utilizing the PHP programming language that you already know.', '978-1484229583', '26.99'),
(35, 4, 36, 'Learning PHP 7', 'PHP is a great language for building web applications. It is essentially a server-side scripting language that is also used for general purpose programming. PHP 7 is the latest version with a host of new features, and it provides major backwards-compatibility breaks. This book begins with the fundamentals of PHP programming by covering the basic concepts such as variables, functions, class, and objects. You will set up PHP server on your machine and learn to read and write procedural PHP code. After getting an understanding of OOP as a paradigm, you will execute MySQL queries on your database. Moving on, you will find out how to use MVC to create applications from scratch and add tests. Then, you will build REST APIs and perform behavioral tests on your applications. By the end of the book, you will have the skills required to read and write files, debug, test, and work with MySQL.', '978-1785880544', '34.99'),
(36, 4, 37, 'Building a Web Application with PHP and Mariadb', 'Starting with a quick refresher of the PHP language and MariaDB database, readers will explore concepts such as unit testing, session authentication and management, permissions engine, caching, security, and performance optimization. Building a Web Application with PHP and MariaDB: A Reference Guide begins with basic and advanced programming techniques in both PHP and MariaDB, followed by specialized operations such as working with files and directories. Next, you will be introduced to the concept of REST, and how principles of REST are applied to host XML and JSON feeds for others to consume. This book will show readers how to build a web application that will be an online book store. This would leverage a logging system that keeps a track of the activity that is going on in the application. This book will help a beginner to learn the basics of object-oriented programming with PHP and help a seasoned expert to understand the intricacies of securing and speeding up their web applications. Who This Book Is For: If you are a developer who wants to use PHP and MariaDB to build web applications, this book is ideal for you. Beginners can use this book to start with the basics and learn how to build and host web applications. Seasoned PHP Developers can use this book to get familiar with the new features of PHP 5.4 and 5.5, unit testing, caching, security, and performance optimization.', '978-1783981625', '35.99'),
(37, 4, 38, 'Pro PHP Refactoring', 'Many businesses and organizations depend on older high-value PHP software that risks abandonment because it is impossible to maintain. The reasons for this may be that the software is not well designed; there is only one developer (the one who created the system) who can develop it because he didn\'t use common design patterns and documentation; or the code is procedural, not object-oriented. With this book, you\'ll learn to identify problem code and refactor it to create more effective applications using test-driven design.', '978-1430227274', '38.74'),
(38, 4, 39, 'Mastering Symfony', 'In this book, you will learn some lesser known aspects of development with Symfony, and you will see how to use Symfony as a framework to create reliable and effective applications. You might have developed some impressive PHP libraries in other projects, but what is the point when your library is tied to one particular project? With Symfony, you can turn your code into a service and reuse it in other projects. This book starts with Symfony concepts such as bundles, routing, twig, doctrine, and more, taking you through the request/response life cycle. You will then proceed to set up development, test, and deployment environments in AWS. Then you will create reliable projects using Behat and Mink, and design business logic, cover authentication, and authorization steps in a security checking process. You will be walked through concepts such as DependencyInjection, service containers, and services, and go through steps to create customized commands for Symfony\'s console. Finally, the book covers performance optimization and the use of Varnish and Memcached in our project, and you are treated with the creation of database agnostic bundles and best practices.\r\n\r\n', ' 978-1784390310', '39.99'),
(39, 4, 40, 'Laravel: Up and Running', 'What sets Laravel apart from other PHP web frameworks? Speed and simplicity, for starters. This rapid application development framework and its vast ecosystem of tools let you quickly build new sites and applications with clean, readable code. With this practical guide, Matt Stauffer a leading teacher and developer in the Laravel community provides the definitive introduction to one of today\'s most popular web frameworks. The book\'s high-level overview and concrete examples will help experienced PHP web developers get started with Laravel right away. By the time you reach the last page, you should feel comfortable writing an entire application in Laravel from scratch.', '978-1491936085', '37.01'),
(40, 4, 41, 'Learning PHP 7 High Performance', 'PHP is a great language for building web applications. It is essentially a server-side scripting language that is also used for general-purpose programming. PHP 7 is the latest version, providing major backward-compatibility breaks and focusing on high performance and speed. This fast-paced introduction to PHP 7 will improve your productivity and coding skills. The concepts covered will allow you, as a PHP programmer, to improve the performance standards of your applications. We will introduce you to the new features in PHP 7 and then will run through the concepts of object-oriented programming (OOP) in PHP 7. Next, we will shed some light on how to improve your PHP 7 applications\' performance and database performance. Through this book, you will be able to improve the performance of your programs using the various benchmarking tools discussed. At the end, the book discusses some best practices in PHP programming to help you improve the quality of your code.', '978-1785882265', '29.99');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `idCart` int(11) NOT NULL,
  `idBook` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `datePurchased` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idCategory`, `name`) VALUES
(1, 'C#'),
(2, 'Java'),
(3, 'JavaScript'),
(4, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `idCountry` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`idCountry`, `name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Aruba'),
(13, 'Australia'),
(14, 'Austria'),
(15, 'Azerbaijan'),
(16, 'Bahamas'),
(17, 'Bahrain'),
(18, 'Bangladesh'),
(19, 'Barbados'),
(20, 'Belarus'),
(21, 'Belgium'),
(22, 'Belize'),
(23, 'Benin'),
(24, 'Bermuda'),
(25, 'Bhutan'),
(26, 'Bolivia'),
(27, 'Bosnia and Herzegovina'),
(28, 'Botswana'),
(29, 'Bouvet Island'),
(30, 'Brazil'),
(31, 'British Indian Ocean Territory'),
(32, 'Brunei Darussalam'),
(33, 'Bulgaria'),
(34, 'Burkina Faso'),
(35, 'Burundi'),
(36, 'Cambodia'),
(37, 'Cameroon'),
(38, 'Canada'),
(39, 'Cape Verde'),
(40, 'Cayman Islands'),
(41, 'Central African Republic'),
(42, 'Chad'),
(43, 'Chile'),
(44, 'China'),
(45, 'Christmas Island'),
(46, 'Cocos (Keeling) Islands'),
(47, 'Colombia'),
(48, 'Comoros'),
(49, 'Congo'),
(50, 'Cook Islands'),
(51, 'Costa Rica'),
(52, 'Croatia (Hrvatska)'),
(53, 'Cuba'),
(54, 'Cyprus'),
(55, 'Czech Republic'),
(56, 'Denmark'),
(57, 'Djibouti'),
(58, 'Dominica'),
(59, 'Dominican Republic'),
(60, 'East Timor'),
(61, 'Ecuador'),
(62, 'Egypt'),
(63, 'El Salvador'),
(64, 'Equatorial Guinea'),
(65, 'Eritrea'),
(66, 'Estonia'),
(67, 'Ethiopia'),
(68, 'Falkland Islands (Malvinas)'),
(69, 'Faroe Islands'),
(70, 'Fiji'),
(71, 'Finland'),
(72, 'France'),
(73, 'France, Metropolitan'),
(74, 'French Guiana'),
(75, 'French Polynesia'),
(76, 'French Southern Territories'),
(77, 'Gabon'),
(78, 'Gambia'),
(79, 'Georgia'),
(80, 'Germany'),
(81, 'Ghana'),
(82, 'Gibraltar'),
(83, 'Guernsey'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guinea'),
(91, 'Guinea-Bissau'),
(92, 'Guyana'),
(93, 'Haiti'),
(94, 'Heard and Mc Donald Islands'),
(95, 'Honduras'),
(96, 'Hong Kong'),
(97, 'Hungary'),
(98, 'Iceland'),
(99, 'India'),
(100, 'Isle of Man'),
(101, 'Indonesia'),
(102, 'Iran (Islamic Republic of)'),
(103, 'Iraq'),
(104, 'Ireland'),
(105, 'Israel'),
(106, 'Italy'),
(107, 'Ivory Coast'),
(108, 'Jersey'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jordan'),
(112, 'Kazakhstan'),
(113, 'Kenya'),
(114, 'Kiribati'),
(115, 'Korea, Democratic People\'s Rep'),
(116, 'Korea, Republic of'),
(117, 'Kosovo'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People\'s Democratic Republ'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macau'),
(130, 'Macedonia'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States o'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestine'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Kitts and Nevis'),
(185, 'Saint Lucia'),
(186, 'Saint Vincent and the Grenadin'),
(187, 'Samoa'),
(188, 'San Marino'),
(189, 'Sao Tome and Principe'),
(190, 'Saudi Arabia'),
(191, 'Senegal'),
(192, 'Serbia'),
(193, 'Seychelles'),
(194, 'Sierra Leone'),
(195, 'Singapore'),
(196, 'Slovakia'),
(197, 'Slovenia'),
(198, 'Solomon Islands'),
(199, 'Somalia'),
(200, 'South Africa'),
(201, 'South Georgia South Sandwich I'),
(202, 'South Sudan'),
(203, 'Spain'),
(204, 'Sri Lanka'),
(205, 'St. Helena'),
(206, 'St. Pierre and Miquelon'),
(207, 'Sudan'),
(208, 'Suriname'),
(209, 'Svalbard and Jan Mayen Islands'),
(210, 'Swaziland'),
(211, 'Sweden'),
(212, 'Switzerland'),
(213, 'Syrian Arab Republic'),
(214, 'Taiwan'),
(215, 'Tajikistan'),
(216, 'Tanzania, United Republic of'),
(217, 'Thailand'),
(218, 'Togo'),
(219, 'Tokelau'),
(220, 'Tonga'),
(221, 'Trinidad and Tobago'),
(222, 'Tunisia'),
(223, 'Turkey'),
(224, 'Turkmenistan'),
(225, 'Turks and Caicos Islands'),
(226, 'Tuvalu'),
(227, 'Uganda'),
(228, 'Ukraine'),
(229, 'United Arab Emirates'),
(230, 'United Kingdom'),
(231, 'United States'),
(232, 'United States minor outlying i'),
(233, 'Uruguay'),
(234, 'Uzbekistan'),
(235, 'Vanuatu'),
(236, 'Vatican City State'),
(237, 'Venezuela'),
(238, 'Vietnam'),
(239, 'Virgin Islands (British)'),
(240, 'Virgin Islands (U.S.)'),
(241, 'Wallis and Futuna Islands'),
(242, 'Western Sahara'),
(243, 'Yemen'),
(244, 'Zaire'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `idFooter` int(11) NOT NULL,
  `header` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`idFooter`, `header`, `content`) VALUES
(1, 'Best programming books', 'Great source of knowlage for learning new programming language or reinforcing existing knowlage.');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `idImage` int(11) NOT NULL,
  `original` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `small` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`idImage`, `original`, `small`) VALUES
(1, 'default.png', 'small-default.png'),
(2, 'csharp-1.jpg', 'small-csharp-1.jpg'),
(3, 'csharp-2.jpg', 'small-csharp-2.jpg'),
(4, 'csharp-3.jpg', 'small-csharp-3.jpg'),
(5, 'csharp-4.jpg', 'small-csharp-4.jpg'),
(6, 'csharp-5.jpg', 'small-csharp-5.jpg'),
(7, 'csharp-6.jpg', 'small-csharp-6.jpg'),
(8, 'csharp-7.jpg', 'small-csharp-7.jpg'),
(9, 'csharp-8.jpg', 'small-csharp-8.jpg'),
(10, 'csharp-9.jpg', 'small-csharp-9.jpg'),
(11, 'csharp-10.jpg', 'small-csharp-10.jpg'),
(12, 'java-1.jpg', 'small-java-1.jpg'),
(13, 'java-2.jpg', 'small-java-2.jpg'),
(14, 'java-3.jpg', 'small-java-3.jpg'),
(15, 'java-4.jpg', 'small-java-4.jpg'),
(16, 'java-5.jpg', 'small-java-5.jpg'),
(17, 'java-6.jpg', 'small-java-6.jpg'),
(18, 'java-7.jpg', 'small-java-7.jpg'),
(19, 'java-8.jpg', 'small-java-8.jpg'),
(20, 'java-9.jpg', 'small-java-9.jpg'),
(21, 'java-10.jpg', 'small-java-10.jpg'),
(22, 'js-1.jpg', 'small-js-1.jpg'),
(23, 'js-2.jpg', 'small-js-2.jpg'),
(24, 'js-3.jpg', 'small-js-3.jpg'),
(25, 'js-4.jpg', 'small-js-4.jpg'),
(26, 'js-5.jpg', 'small-js-5.jpg'),
(27, 'js-6.jpg', 'small-js-6.jpg'),
(28, 'js-7.jpg', 'small-js-7.jpg'),
(29, 'js-8.jpg', 'small-js-8.jpg'),
(30, 'js-9.jpg', 'small-js-9.jpg'),
(31, 'js-10.jpg', 'small-js-10.jpg'),
(32, 'php-1.jpg', 'small-php-1.jpg'),
(33, 'php-2.jpg', 'small-php-2.jpg'),
(34, 'php-3.jpg', 'small-php-3.jpg'),
(35, 'php-4.jpg', 'small-php-4.jpg'),
(36, 'php-5.jpg', 'small-php-5.jpg'),
(37, 'php-6.jpg', 'small-php-6.jpg'),
(38, 'php-7.jpg', 'small-php-7.jpg'),
(39, 'php-8.jpg', 'small-php-8.jpg'),
(40, 'php-9.jpg', 'small-php-9.jpg'),
(41, 'php-10.jpg', 'small-php-10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idRole`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `idSocial` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`idSocial`, `link`, `name`) VALUES
(1, 'https://www.facebook.com', '<i class=\"fab fa-facebook\"></i>'),
(2, 'https://www.twitter.com', '<i class=\"fab fa-twitter\"></i>'),
(3, 'https://www.instagram.com', '<i class=\"fab fa-instagram\"></i>'),
(4, 'https://vk.com/', '<i class=\"fab fa-vk\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  `idCountry` int(11) NOT NULL,
  `idImage` int(11) NOT NULL,
  `firstName` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `idRole`, `idCountry`, `idImage`, `firstName`, `lastName`, `email`, `username`, `password`) VALUES
(1, 1, 192, 1, 'Stefan', 'Adamovic', 'stefan.adamovic.94.17@ict.edu.rs', 'admin', '0192023a7bbd73250516f069df18b500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`idAuthor`);

--
-- Indexes for table `author_book`
--
ALTER TABLE `author_book`
  ADD PRIMARY KEY (`idAuthorBook`),
  ADD KEY `idAuthor` (`idAuthor`),
  ADD KEY `idBook` (`idBook`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`idBook`),
  ADD KEY `idCategory` (`idCategory`),
  ADD KEY `idImage` (`idImage`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idCart`),
  ADD KEY `idBook` (`idBook`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`idCountry`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`idFooter`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idImage`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`idSocial`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idRole` (`idRole`),
  ADD KEY `idCountry` (`idCountry`),
  ADD KEY `idImage` (`idImage`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `idAuthor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `author_book`
--
ALTER TABLE `author_book`
  MODIFY `idAuthorBook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `idBook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `idCart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `idCountry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `idFooter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `idSocial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author_book`
--
ALTER TABLE `author_book`
  ADD CONSTRAINT `author_book_ibfk_1` FOREIGN KEY (`idAuthor`) REFERENCES `author` (`idAuthor`),
  ADD CONSTRAINT `author_book_ibfk_2` FOREIGN KEY (`idBook`) REFERENCES `book` (`idBook`);

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`idImage`) REFERENCES `image` (`idImage`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`idBook`) REFERENCES `book` (`idBook`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`idCountry`) REFERENCES `country` (`idCountry`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`idImage`) REFERENCES `image` (`idImage`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
