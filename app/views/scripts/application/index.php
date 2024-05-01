<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Task List</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>    
    </head>
    <body>
    
    <h2 class="flex justify-center items-center mb-4 mt-8 text-3xl font-bold leading-none tracking-tight text-blue-800 md:text-5xl lg:text-6xl dark:text-white">Task Manager</h2>

    <table class="min-w-full divide-y divide-gray-200">
        <div class="-mb-2 py-4 flex flex-wrap flex-grow justify-end w-full">
            <div class="flex content-end p-8">
                <a href="createTask.phtml"
                    class="inline-block px-8 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-blue-600 hover:bg-green-400 focus:outline-none focus:shadow-outline">
                    Create new task
                </a>
            </div>
        </div>
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Creation Date
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php if ($this -> allTasks !== null): ?>
                <?php foreach ($this -> allTasks as $task): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php echo htmlspecialchars($task['id']); ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php echo htmlspecialchars($task['description']); ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                                <?php echo htmlspecialchars($task['status']); ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php echo htmlspecialchars($task['date_ini']); ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php echo htmlspecialchars($task['date_end']); ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php echo htmlspecialchars($task['user']); ?>
                        </td>
                        <td class=" py-4 whitespace-nowrap">
                            
                            <button
                                class="px-4 py-2 font-medium text-white bg-blue-300 rounded-md hover:bg-gray-200 focus:outline-none focus:shadow-outline-blue active:bg-blue-300 transition duration-150 ease-in-out">Edit task</button>
                            <button
                                class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="px-6 py-4 whitespace-no-wrap text-center border-b border-gray-200">
                        <p class="text-red-600">No tasks available</p>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    </body>
</html>