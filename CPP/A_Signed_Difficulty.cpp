#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{}

int main()
{
      //        Bismillah
    // w(t)
    double p;
    cin >> p;
    int d = (int)(p*10);
    int lastDig = d%10;
    if(lastDig <= 2)
    {
        cout << d/10 << "-" << endl;
    } 
    else if(lastDig <= 6)
    {
        cout << d/10 << endl;
    }
    else
    {
        cout << d/10 << "+" << endl;
    }
}