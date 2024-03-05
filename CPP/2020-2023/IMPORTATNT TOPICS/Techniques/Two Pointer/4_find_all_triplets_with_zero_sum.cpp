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
    int n;
    cin >> n;
    int arr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }

    for(int i = 0; i < n; i++)
    {
        unordered_set<int> us;
        for(int j = i+1; j < n; j++)
        {
            int x = -(arr[i]+arr[j]);

            if(us.find(x)!=us.end())
            {
                cout << arr[i] << " " << arr[j] << " " << x << endl;
            }
            else 
                us.insert(arr[j]);
        }
    }
}