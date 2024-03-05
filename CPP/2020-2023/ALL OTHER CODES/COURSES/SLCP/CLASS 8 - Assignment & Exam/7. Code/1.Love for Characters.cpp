#include <bits/stdc++.h>
using namespace std;

void solve()
{
   int n;
   cin >> n;
   string str;
   cin >> str;
   int a = 0, s = 0, p = 0;
   for(int i = 0; i < n; i++)
   {    
       if(str[i] == 'a') a++;
       if(str[i] == 's') s++;
       if(str[i] == 'p') p++;   
   } 
   cout << a << " " << s << " " << p << endl;
}

int main()
{
    solve(); 
}