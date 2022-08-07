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
    int arr[27];
    for(int i = 1; i <= 26; i++) cin >> arr[i];

    for(int i = 1; i <= 26; i++)
    {
        cout << (char)(arr[i]+96);
    }
    cout << endl;
}