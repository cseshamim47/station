using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleAppContainer
{
    internal static class XYZCorporation
    {
        private static Person[] personList = new Person[100000];
        private static int count = 0;

        internal static void AddPerson(Person p)
        {
            personList[count] = p;
            count++;
        }

        internal static void ShowAll()
        {
            int index = 0;
            while (index < count)
            {
               if(personList[index] != null)
                    personList[index].ShowInfo();
                                
                index++;
            }
        }

        internal static bool Search(string key, out int info)
        {
            bool found = false;
            int index = 0;
            while (index < count)
            {
                if (key.Equals(personList[index].Id))
                {
                    found = true;
                    info = index;
                    Console.WriteLine("Data Found");
                    personList[index].ShowInfo();
                    return found;
                    //break;
                }
                index++;
            }

            if (!found)
                Console.WriteLine("Data Not Found");
            info = -1;
            return found;
        }

        internal static void DeletePerson(string key)
        {
            int indexNumber;
            bool decision = Search(key, out indexNumber);
            if (decision)
            {
                personList[indexNumber] = null;
                Console.WriteLine("Delete Complete\n*******x********\n");
                ShowAll();
            }
        }
    }
}
