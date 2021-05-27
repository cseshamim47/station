#include <bits/stdc++.h>
using namespace std;

int fun(int *str1)
{
  int *str2 = str1;
  while(*++str1 != 0) cout << *str1 << " ";
  return (str1-str2);
}
 
int main()
{
  int arr[6] = {1,2,3,4,5,0};
  int *ptr = arr;
  int *nptr = arr + 3;
  cout << (nptr - ptr) << endl;
//   cout << endl << fun(ptr);
  return 0;
}