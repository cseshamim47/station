/* Class 9 tasks : 
// dequeue, priority_queue
// pass by reference, pass by value
// 2d vector -> two way, passing array and vector to a function
//  
1. print the index number of max element in an array
2. check if an array is sorted or not
3. given 3 numbers you have to tell if sum of any two of them is equal to the third one. If yes then Print YES, else print NO 
*/

#include <bits/stdc++.h>
using namespace std;

void p3()
{
    int arr[3] = {3,2,1};
    sort(arr,arr+3);
    cout << (arr[0]+arr[1] == arr[2] ? "YES" : "NO") << endl;
}

void p2()
{
    // copy the array, then sort one of them then each index if they are same
    int n = 5;
    int arr[n] = {10,20,50,1000,800000};

    for(int i = 1; i < n; i++)
    {
        if(arr[i]<arr[i-1])
        {
            cout << "Not sorted" << endl;
            return;
        }
    }
    cout << "Sorted" << endl;
}
void p1()
{
    int arr[5] = {10,2,5,1000,8};
    int idx = -1;
    int mx = 0;

    for(int i = 0; i < 5; i++)
    {
        if(mx < arr[i])
        {
            mx = arr[i];
            idx = i;
        }
    }
    cout << idx << endl;


}

void name(string myName) // pass by value
{
    cout << myName << endl;
}
void name1(string &myName) // pass by reference
{
    cout << myName << endl;
    myName = "Abdul Rabbi";
}

void f(int arr[], int n)
{
    for(int i = 0; i < n; i++) 
    {
        cout << arr[i] << " ";
    }
}

void newF(const vector<int> &v)
{
    for(int i = 0; i < v.size(); i++) 
    {
        cout << v[i] << " ";
    }
    cout << endl;
}

int main()
{
    p3();
    getchar();
    getchar();

    vector<int> t;
    t.push_back(10);
    t.push_back(11);
    t.push_back(1);
    // cout << t[0] << endl;
    vector<vector<int>> dynamicV;
    // vector<vector<int>> dynamicV[10];
    dynamicV.push_back(t);
    // dynamicV[0] = {1,2,3,4};

    for(auto x : dynamicV[0]) cout << x << " ";


    int sz = 5;
    vector<int> vv[5];

    int i = 0;
    while(sz--)
    {
        int vsize;
        cin >> vsize;
        vv[i].resize(vsize,5);   
        cout << vv[i].size() << endl;     
        i++;
    }

    for(auto i : vv)
    {
        for(auto &j : i) 
        {
            cout << j << " ";
        }
        cout << endl;
    }


    vector<int> v = {1,2,3,4,5};
    newF(v);

    int n = 5;
    int arr[n] {1,2,3,4,5};
    f(arr,n);


    string str = "shamim";
    name1(str);
    cout << str << endl;


    priority_queue<int,vector<int>,greater<int>> pq;
    pq.push(8);
    pq.push(3);
    pq.push(100);
    pq.push(2);
    pq.push(10);

    while(pq.size() > 0)
    {
        cout << pq.top() << " ";
        pq.pop();
    }

    deque<int> dq;

    dq.push_back(1);
    dq.push_back(2);
    dq.push_back(3);

    dq.push_front(0);
    dq.push_front(-1);
    dq.push_front(-2);

    while(dq.empty() == false)
    {
        cout << dq.back() << " ";
        dq.pop_back();
    }

    // dq : -2 -1 0 1 2 3 
}