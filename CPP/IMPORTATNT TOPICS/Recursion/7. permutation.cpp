#include <bits/stdc++.h>
using namespace std;

const int n = 3;
int arr[] = {1,2,3};
int f[n+1];
vector<int> v;
void t()
{
    if(v.size() == n)
    {
        for(auto x : v) cout << x << " ";
        cout << endl;
    }

    for(int i = 0; i < n; i++)
    {
        if(f[arr[i]] == 0)
        {
            v.push_back(arr[i]);
            f[arr[i]] = 1;
            t();
            v.pop_back();
            f[arr[i]] = 0;
        }
    }
}

int main()
{
    t();       
}