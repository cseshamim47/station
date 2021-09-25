#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    string str;
    cin >> str;
    for(int i = 0; i < n; i++)
    {
        if(str[i] == 'U') cout << 'D';
        else if(str[i] == 'D') cout << 'U';
        else cout << str[i];
    }
    cout << endl;
}

int main()
{
      //        Bismillah
    w(t)
    
}