#include <bits/stdc++.h>
using namespace std;

const int n = 4;
vector<int> arr{2,2,4,3,3,1,1,1};
vector<int> v;

void f(int idx,int target)
{
    if(target == 0)
    {
        for(auto x : v) cout << x << " ";
        cout << endl;
        return;
    }
    
    for(int i = idx; i < arr.size(); i++)
    {
        if(idx < i && arr[i] == arr[i-1]) continue;

        if(target < arr[i]) return;

        v.push_back(arr[i]);
        f(i+1,target-arr[i]);
        v.pop_back();
    }
}

int main()
{
    int target = 4;
    sort(arr.begin(),arr.end());
    f(0,target);
    
}