package com.cseshamim.demo;

import org.springframework.context.ApplicationContext;
import org.springframework.context.support.ClassPathXmlApplicationContext;

public class App 
{
    public static void main( String[] args )
    {
    	ApplicationContext context = new ClassPathXmlApplicationContext("spring.xml");
    	Vehicle obj = (Vehicle) context.getBean("vehicle");
    	obj.drive();
    }
}
