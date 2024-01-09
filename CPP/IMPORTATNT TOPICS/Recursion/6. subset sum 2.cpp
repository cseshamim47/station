#include <bits/stdc++.h>
using namespace std;

const int n = 4;
int arr[] = {1,2,2,3};
vector<int> v;
void t(int idx)
{
    if(v.empty() == true) cout << "null set";
    for(auto x : v) cout << x << " ";
    cout << endl;

    for(int i = idx; i < n; i++)
    {
        if(i > idx && arr[i] == arr[i-1]) continue;

        v.push_back(arr[i]);
        t(i+1);
        v.pop_back();
    }
}

int main()
{
    t(0);
}