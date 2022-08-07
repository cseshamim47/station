//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
ll cnt;

int main()
{
      //        Bismillah
    int p1=0,p2=0,n;
    cin >> n;
    int lead=INT_MIN,leader = 1;
    while(n--)
    {
        int a,b;
        cin >> a >> b;
        int tmpLead;
        p1 += a;
        p2 += b;
        tmpLead = abs(p1-p2);
        if(tmpLead > lead)
        {
            lead = tmpLead;
            if(p1>=p2) leader = 1;
            else leader = 2; 
        }
    }
    cout << leader << " " << lead << "\n";

}